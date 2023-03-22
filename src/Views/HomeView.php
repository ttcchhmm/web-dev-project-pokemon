<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

/**
 * The view used by HomeController.
 */
class HomeView implements IView {
	public function display(array $options): string {
        ob_start();
        ?>

        <div class="center">
            <div>
                <h1>Welcome to PokéWeb !</h1>
                <p>Use the menu above to browse the site.</p>
            </div>

            <video src="public/eevee.mp4" class="gif" autoplay muted disablePictureInPicture loop></video>
        </div>

        <?php
        return ob_get_clean();
    }
}