<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

class ShowView implements IView {
	public function display(array $options): string {
        ob_start();
        ?>

        <h1>Searching Pokémons by type</h1>
        <div id="loading-animation">
            <img src="public/spin.gif" class="gif" alt="">
            <p>Loading, please wait...</p>
        </div>
        <div id="search-content">
            <form id="search-form">
                <label for="type">Type: </label>
                <select name="type" id="type"></select>
            </form>
        </div>

        <?php
        return ob_get_clean();
	}
}