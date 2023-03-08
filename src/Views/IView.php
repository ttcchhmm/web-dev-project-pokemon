<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

/**
 * An interface representing a view.
 */
interface IView {
    
    /**
     * Called when the view is tasked to render something.
     * 
     * @param array $options An associative array containing the options passed to the view.
     * @return string The body of the response.
     */
    public function display(array $options): string;
}