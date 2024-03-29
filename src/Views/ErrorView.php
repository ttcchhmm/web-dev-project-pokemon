<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

/**
 * The view used by ErrorController.
 * 
 * Options:
 * - message : The error message to display.
 */
class ErrorView implements IView {
    public function display(array $options): string {
        ob_start();
        ?>
        
        <h1>Oops !</h1>
        <p><?= $options['message'] ?></p>

        <?php
        return ob_get_clean();
    }
}