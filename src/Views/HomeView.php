<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

/**
 * The view used by HomeController.
 */
class HomeView implements IView {
	public function display(array $options): string {
        ob_start();
        ?>

        <p>Welcome to PokéWeb !</p>

        <?php
        return ob_get_clean();
    }
}