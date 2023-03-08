<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Views\IView;
use PokeWeb\Views\HomeView;

/**
 * The controller for the /home route.
 */
class HomeController implements IController {
	private IView $view;

	public function __construct() {
		$this->view = new HomeView();
	}

	public function render(string $action, string $id): array {
        return [
			'title' => 'Home',
			'content' => $this->view->display([]),
		];
	}
}