<?php

use PokeWeb\Controllers\LogController;
use PokeWeb\Controllers\PokemonController;
use PokeWeb\Controllers\HomeController;
use PokeWeb\Controllers\ErrorController;
use PokeWeb\Controllers\TestController;

/**
 * Associative array with the route's name as the key and the associated controller as the value.
 */
const routes = [
    'home' => new HomeController(),
    'test' => new TestController(),
    'pokemon' => new PokemonController(),
    'log' => new LogController(),
    'error' => new ErrorController(),
];