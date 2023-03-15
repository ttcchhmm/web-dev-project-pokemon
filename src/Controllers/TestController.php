<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Models\Pokemon;
use PokeWeb\Utils\XML;
use PokeWeb\Views\IView;
use PokeWeb\Views\TestView;

class TestController implements IController {
    private IView $_view;

    public function __construct() {
        $this->_view = new TestView();
    }


	public function render(string $action, string $id): array {
        XML::append('View', new \DateTime(), 'Fetched every Pokémon in the database.');

        $poke = Pokemon::fetchAll();
        return [
            'content' => $this->_view->display(['pokemons' => $poke]),
            'title' => 'Database Test',
        ];
	}
}