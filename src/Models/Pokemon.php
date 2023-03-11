<?php

declare(strict_types = 1);
namespace PokeWeb\Models;

use PokeWeb\Utils\Database;

/**
 * A model for a Pokémon.
 * 
 * @template-implements IModel<Pokemon>
 */
class Pokemon implements IModel {

    /**
     * The Pokémon's ID.
     */
    private int $_id;

    /**
     * The Pokémon's name.
     */
    private string $_name;

    /**
     * The Pokémon's size.
     */
    private int $_size;

    /**
     * The Pokémon's weight.
     */
    private int $_weight;

    /**
     * The Pokémon's types.
     */
    private array $_types;

    public function __construct(int $id, string $name, int $size, int $weight, array $types) {
        $this->_id = $id;
        $this->_name = $name;
        $this->_size = $size;
        $this->_types = $types;
    }

    /**
     * Get the Pokémon's ID.
     * 
     * @return int The Pokémon's ID.
     */
    public function getId(): int {
        return $this->_id;
    }

    /**
     * Get the Pokémon's name.
     * 
     * @return int The Pokémon's name.
     */
    public function getName(): string {
        return $this->_name;
    }

    /**
     * Get the Pokémon's size.
     * 
     * @return int The Pokémon's size.
     */
    public function getSize(): int {
        return $this->_size;
    }

    /**
     * Get the Pokémon's weight.
     * 
     * @return int The Pokémon's weight.
     */
    public function getWeight(): int {
        return $this->_weight;
    }

    /**
     * Get the Pokémon's types.
     * 
     * @return int The Pokémon's types.
     */
    public function getTypes(): array {
        return $this->_types;
    }
	/**
	 * Return one element by its ID.
	 *
	 * @param int $id The ID to fetch.
	 * @return Pokemon The data fetched from the database.
	 */
	static public function fetchOne(int $id): ?IModel {
        $sttPoke = Database::getPDO()->prepare("SELECT * FROM pokemon WHERE pok_id = :id");
        $sttPoke->setFetchMode(\PDO::FETCH_ASSOC);
        $sttPoke->execute([
            'id' => $id,
        ]);

        $record = $sttPoke->fetch();

        // Get type
        $sttType = Database::getPDO()->prepare("SELECT UNIQUE t.type_id FROM pokemon_types p JOIN types t ON p.type_id = t.type_id WHERE p.pok_id = :pok_id");
        $sttType->setFetchMode(\PDO::FETCH_ASSOC);
        $sttType->execute([
            'pok_id' => $record['pok_id'],
        ]);

        $types = [];

        while($recordType = $sttType->fetch()) {
            $types[] = Type::fetchOne($recordType['type_id']);
        }

        return new Pokemon($record['pok_id'], $record['pok_name'], $record['pok_height'], $record['pok_weight'], $types);
	}
	
	/**
	 * Return all elements.
	 * @return array<Pokemon> Every element stored in the database.
	 */
	static public function fetchAll(): array {
        $pokemons = [];

        $stt = Database::getPDO()->query("SELECT pok_id FROM pokemon");
        while($record = $stt->fetch(\PDO::FETCH_ASSOC)) {
            $pokemons[] = Pokemon::fetchOne($record['pok_id']);
        }

        return $pokemons;
	}
}