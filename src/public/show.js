const loadingAnimation = document.querySelector('#loading-animation');
const searchContent = document.querySelector('#search-content');

fetch('/index.php?controller=api&action=getTypes')
    .then((data) => data.json())
    .then((json) => {
        const typeSelect = document.querySelector('#type');

        for(const e of json) {
            console.log(e);

            loadingAnimation.classList.add('hide');
            searchContent.classList.remove('hide');
        }
    })
    .catch((err) => {
        alert(`An error occured: ${err}`);
    });