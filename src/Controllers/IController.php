<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

interface IController {
    public function render(string $action, string $id): string;
}