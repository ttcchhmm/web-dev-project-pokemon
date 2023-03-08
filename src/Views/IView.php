<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

interface IView {
    public function display(array $options): string;
}