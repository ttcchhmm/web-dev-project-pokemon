<?php

declare(strict_types = 1);
namespace PokeWeb\Utils;

/**
 * A helper class used to generate links across the site.
 */
abstract class Links {

    /**
     * Generate a link.
     * 
     * @param string $controller The targeted controller.
     * @param string $action The action to pass to the controller.
     * @param string $id The ID to pass to the controller.
     * 
     * @return string A link to the targeted controller.
     */
    static public function link(string $controller, string $action = '', string $id = ''): string {
        return "/index.php?controller=$controller&action=$action&id=$id";
    }
}