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

        <h1>Welcome to PokéWeb !</h1>
        <p>Use the menu above to browse the site.</p>

        <?php
        return ob_get_clean();
    }
}