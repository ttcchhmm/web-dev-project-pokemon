<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Models\Pokemon;
use PokeWeb\Utils\Database;
use PokeWeb\Utils\XML;
use PokeWeb\Views\EditView;
use PokeWeb\Views\IView;

/**
 * The controller for the /pokemon route.
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

    /**
     * The /pokemon/edit route.
     */
    private function edit(): array {
        $success = false;
        $pokemons = Pokemon::fetchAll();

        uasort($pokemons, function(Pokemon $a, Pokemon $b) {
            return $a->getName() <=> $b->getName();
        });

        if(isset($_POST['pokemon']) && isset($_POST['height']) && isset($_POST['weight'])) {
            $stt = Database::getPDO()->prepare("UPDATE pokemon SET pok_weight = :weight, pok_height = :height WHERE pok_id = :pokemon");
            $success = $stt->execute($_POST);

            if($success) {
                XML::append("edit", new \DateTime(), 'Edited Pokemon ID ' . $_POST['pokemon']. ': height ' . $_POST['height'] . ' / weight ' . $_POST['weight']);
            }
        }

        return [
            'title' => 'Edit',
            'content' => $this->_view->display([
                'success' => $success,
                'pokemons' => $pokemons,
            ])
        ];
    }
}