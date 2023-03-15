<?php

declare(strict_types = 1);
namespace PokeWeb\Views;
use PokeWeb\Utils\Links;

/**
 * The view used by the /pokemon/edit route.
 * 
 * Options:
 * - success: If this is true, the success message will be displayed.
 * - pokemons : An array with every Pokémons.
 */
class EditView implements IView {
	public function display(array $options): string {
        ob_start();

        echo '<h1>Edit a Pokémon</h1>';

        // Success message.
        if($options['success']) {
            ?>
            
            <div class="success">
                <p>Your edit was successfully saved.</p>
            </div>

            <?php
        }

        ?>

        <form action="<?= Links::link('pokemon', 'edit') ?>" method="post">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <label for="pokemon">Pokémon : </label>
                        </td>
                        <td>
                            <select name="pokemon" id="pokemon">
                            <?php

                            // Generate an option tag for every Pokemon.
                            foreach($options['pokemons'] as $pokemon) {
                                ?>

                                <option value="<?= $pokemon->getId() ?>"><?= ucfirst($pokemon->getName()) ?></option>

                                <?php
                            }
                            ?>

                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="height">Height : </label>
                        </td>
                        <td>
                            <input type="number" name="height" id="height" min="1" value="1" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="weight">Weight : </label>
                        </td>
                        <td>
                            <input type="number" name="weight" id="weight" min="1" value="1" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Send edit.</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>

        <?php
        return ob_get_clean();
	}
}