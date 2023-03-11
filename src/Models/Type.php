<?php

declare(strict_types = 1);
namespace PokeWeb\Models;

use PokeWeb\Utils\Database;

/**
 * A model for a Type in Pokémon.
 * 
 * @template-implements IModel<Type>
 */
class Type implements IModel {

    /**
     * The type's ID.
     */
    private int $_id;

    /**
     * The type's name.
     */
    private string $_name;

    public function __construct(int $id, string $name) {
        $this->_id = $id;
        $this->_name = $name;
    }

    /**
     * Get the type's ID.
     * 
     * @return int The type's ID.
     */
    public function getId(): int {
        return $this->_id;
    }

    /**
     * Get the type's name.
     * 
     * @return int The types name.
     */
    public function getName(): string {
        return $this->_name;
    }

    /**
	 * Return one element by its ID.
	 *
	 * @param int $id The ID to fetch.
	 * @return Type The data fetched from the database.
	 */
    static public function fetchOne(int $id): ?IModel {
        $stt = Database::getPDO()->prepare("SELECT * FROM types WHERE type_id = :id");
        $stt->setFetchMode(\PDO::FETCH_ASSOC);
        $stt->execute([
            'id' => $id,
        ]);

        $record = $stt->fetch();
        return new Type($record['type_id'], $record['type_name']);
    }

	/**
	 * Return all elements.
	 * @return array<Type> Every element stored in the database.
	 */
    static public function fetchAll(): array {
        $types = [];

        $stt = Database::getPDO()->query("SELECT type_id FROM types");
        while($record = $stt->fetch(\PDO::FETCH_ASSOC)) {
            $types[] = Type::fetchOne($record['type_id']);
        }

        return $types;
    }
}