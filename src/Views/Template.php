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

    <base href="/">
    <link rel="stylesheet" href="public/main.css">

    <title>PokéWeb - <?= $response['title'] ?></title>
</head>
<body>
    <div id="page"> <!-- div as the only body's child to workaround browser extensions adding elements to the body tag, breaking flexbox. -->
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
                    <li>Edit Pokémon</li>
                    <li>Logs</li>
                    <li>Show Pokémon</li>
                </ul>
            </nav>
        </header>

        <div id="content">
            <?= $response['content'] ?>
        </div>

        <footer>
            <p>&copy; 2023 Tom Chedmail</p>
            <p>L3 Informatique - Université d'Angers</p>
        </footer>
    </div>
</body>
</html>