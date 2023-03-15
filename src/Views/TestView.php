<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

class TestView implements IView {
    public function display(array $options): string {
        ob_start();

        echo '<pre>';
        print_r($options['pokemons']);
        echo '</pre>';

        return ob_get_clean();
    }
}