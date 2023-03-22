const loadingAnimation = document.querySelector('#loading-animation');
const searchContent = document.querySelector('#search-content');
const typeSelect = document.querySelector('#type');
const tableBody = document.querySelector('#poke-table-body');

fetch('/index.php?controller=api&action=getTypes')
    .then((data) => data.json())
    .then((json) => {
        for(const e of json) {
            const option = document.createElement('option');
            option.value = e.id;
            option.innerText = e.name;
            
            typeSelect.appendChild(option);
        }

        typeSelect.value = -1;

        hideLoading()
    })
    .catch((err) => {
        alert(`An error occurred: ${err}`);
    });

typeSelect.addEventListener('change', () => {
    showLoading();
    
    fetch(`/index.php?controller=api&action=getPokemonsByType&id=${typeSelect.value}`)
        .then((data) => data.json())
        .then((json) => {
            tableBody.innerHTML = '';

            for(const e of json) {
                const row = document.createElement('tr');
                
                const name = document.createElement('td');
                const link = document.createElement('a');
                link.href = `https://bulbapedia.bulbagarden.net/wiki/index.php?search=${e.name}`;
                link.innerText = e.name;
                link.target = '_blank';
                link.referrerPolicy = 'no-referrer';
                name.appendChild(link);

                const weight = document.createElement('td');
                weight.innerText = e.weight;

                const size = document.createElement('td');
                size.innerText = e.size;

                const types = document.createElement('td');
                const typeList = document.createElement('ul');

                for(const t of e.types) {
                    const li = document.createElement('li');
                    li.innerText = t.name;

                    typeList.appendChild(li);
                }

                types.appendChild(typeList);

                row.appendChild(name);
                row.appendChild(weight);
                row.appendChild(size);
                row.appendChild(types);

                tableBody.appendChild(row);
            }

            hideLoading();
        })
        .catch((err) => {
            alert(`An error occurred: ${err}`);
            hideLoading();
        });
});

function hideLoading() {
    loadingAnimation.classList.add('hide');
    searchContent.classList.remove('hide');
}

function showLoading() {
    loadingAnimation.classList.remove('hide');
    searchContent.classList.add('hide');
}