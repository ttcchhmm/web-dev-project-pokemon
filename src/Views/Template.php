<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

use PokeWeb\Utils\Links;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PokéWeb: Your Place for Everything Pokémon">

    <base href="/">
    <link rel="stylesheet" href="public/main.css">

    <title>PokéWeb - <?= $response['title'] ?></title>
</head>
<body>
    <header>
        <a href="<?= Links::link('home') ?>" id="branding">
            <div>
                <img src="public/pokeball.svg" alt="Pokeball" id="header-image">
                <h1>PokéWeb</h1>
            </div>
        </a>

        <nav>
            <ul>
                <li><a href="<?= Links::link('home') ?>">Home</a></li>
                <li><a href="<?= Links::link('test') ?>">Database Test</a></li>
                <li><a href="<?= Links::link('pokemon', 'edit') ?>">Edit Pokémon</a></li>
                <li><a href="<?= Links::link('log') ?>">Logs</a></li>
                <li><a href="<?= Links::link('pokemon', 'show') ?>">Show Pokémon</a></li>
            </ul>
        </nav>
    </header>

    <div class="center">
        <div id="content">
            <?= $response['content'] ?>
        </div>
    </div>

    <footer>
        <p>&copy; 2023 Tom Chedmail</p>
        <p lang="fr">L3 Informatique - Université d'Angers</p>
    </footer>
</body>
</html>