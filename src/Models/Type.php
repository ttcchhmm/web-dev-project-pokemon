<?php

declare(strict_types = 1);
namespace PokeWeb\Models;

/**
 * A model for a Type in Pokémon.
 */
class Type {

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
}