<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Views\IView;
use PokeWeb\Views\ErrorView;

class ErrorController implements IController {
    private IView $_view;

    public function __construct() {
        $this->_view = new ErrorView();
    }

	public function render(string $action, string $id): string {
        $options = ['message' => 'An unknown server-side error occurred.'];
        if($action === '404') {
            $options['message'] = 'This page does not exists.';
        }

        return $this->_view->display($options);
	}
}