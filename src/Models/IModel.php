<?php

declare(strict_types = 1);
namespace PokeWeb\Models;

/**
 * An interface representing a model.
 * 
 * @template T
 */
interface IModel {

    /**
     * Return one element by its ID.
     * 
     * @param int $id The ID to fetch.
     * @return T The data fetched from the database.
     */
    static public function fetchOne(int $id): ?IModel;

    /**
     * Return all elements.
     * 
     * @return array<T> Every element stored in the database.
     */
    static public function fetchAll(): array;
}