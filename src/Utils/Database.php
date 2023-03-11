<?php

declare(strict_types = 1);
namespace PokeWeb\Utils;

/**
 * A helper class used to handle database connections.
 */
abstract class Database {

    /**
     * The name of the database to connect to;
     */
    const DATABASE_NAME = 'pokemon';

    /**
     * The address of the MySQL/MariaDB host.
     */
    const DATABASE_HOST = 'mariadb';

    /**
     * The port used when connecting to the database.
     */
    const DATABASE_PORT = '3306';

    /**
     * The user used when issuing database requests.
     */
    const DATABASE_USERNAME = 'root';

    /**
     * The password of the user used when issuing database requests.
     */
    const DATABASE_PASSWORD = 'password';

    /**
     * Singleton of a PDO instance.
     * 
     * Shared across a request to avoid creating multiple database connections.
     */
    static private ?\PDO $_pdo = null;

    /**
     * Get a database connection.
     * 
     * @return \PDO A PDO object.
     */
    static public function getPDO(): \PDO {
        if(Database::$_pdo === null) {
            Database::$_pdo = new \PDO('mysql:host=' . Database::DATABASE_HOST .
                                        ';port=' . Database::DATABASE_PORT .
                                        ';charset=UTF8' .
                                        ';dbname=' . Database::DATABASE_NAME,
                                        Database::DATABASE_USERNAME,
                                        Database::DATABASE_PASSWORD,
                                        [
                                            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                                        ]
            );
        }
        
        return Database::$_pdo;
    }
}