<?php

declare(strict_types = 1);
namespace PokeWeb\Models;

/**
 * A model for a Pokémon.
 */
class Pokemon {

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
}