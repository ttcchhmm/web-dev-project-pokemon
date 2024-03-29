<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

/**
 * An interface representing a controller.
 */
interface IController {

    /**
     * Called when the controller is tasked to render the page.
     * 
     * @param string $action The action the controller should perform.
     * @param string $id The ID of the ressource the controller should target.
     * 
     * @return array An associative array with 'title' as the page title and 'content' as the body of the response.
     */
    public function render(string $action, string $id): array;
}