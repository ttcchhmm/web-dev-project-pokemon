<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Models\Pokemon;
use PokeWeb\Views\EditView;
use PokeWeb\Views\IView;

/**
 * The controller for the /edit route.
 */
class PokemonController implements IController {
    private IView $_view;

    public function __construct() {
        $this->_view = new EditView();
    }

	public function render(string $action, string $id): array {
        switch($action) {
            case 'edit': {
                return $this->edit();
            }
        }

        return routes['error']->render('404', '');
	}

    private function edit(): array {
        $pokemons = Pokemon::fetchAll();

        uasort($pokemons, function(Pokemon $a, Pokemon $b) {
            return $a->getName() <=> $b->getName();
        });

        return [
            'title' => 'Edit',
            'content' => $this->_view->display([
                'success' => false,
                'pokemons' => $pokemons,
            ])
        ];
    }
}