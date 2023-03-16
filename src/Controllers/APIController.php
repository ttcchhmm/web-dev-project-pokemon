<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;
use PokeWeb\Models\Type;

class APIController implements IController {
	public function render(string $action, string $id): array {
        header('Content-Type: application/json');

        $payload = '';
        switch($action) {
            case 'getTypes': {
                $payload = json_encode(Type::fetchAll());
                break;
            }

            case 'getPokemonsByType': {
                $type = Type::fetchOne((int) $id);
                $payload = json_encode($type->getPokemons());
                break;
            }

            default: {
                $payload = json_encode(['error' => 'Invalid API endpoint.']);
                break;
            }
        }

        return [
            'hideTemplate' => true,
            'content' => $payload,
        ];
	}
}