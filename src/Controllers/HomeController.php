<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Views\IView;
use PokeWeb\Views\HomeView;

class HomeController implements IController {
	private IView $view;

	public function __construct() {
		$this->view = new HomeView();
	}

	public function render(string $action, string $id): string {
        return $this->view->display([]);
	}
}