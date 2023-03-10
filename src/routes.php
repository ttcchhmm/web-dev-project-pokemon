<?php

use PokeWeb\Controllers\HomeController;
use PokeWeb\Controllers\ErrorController;

/**
 * Associative array with the route's name as the key and the associated controller as the value.
 */
const routes = [
    'home' => new HomeController(),
    'error' => new ErrorController(),
];