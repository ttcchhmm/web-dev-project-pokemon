<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Views\IView;
use PokeWeb\Views\ErrorView;

/**
 * The controller used to answer errors.
 * 
 * Actions :
 * - *nothing* : Should be used for any kind of server-side error.
 * - 404 : Send a 404 error message.
 */
class ErrorController implements IController {
    private IView $_view;

    public function __construct() {
        $this->_view = new ErrorView();
    }

	public function render(string $action, string $id): array {
        $title = 'Error';
        $options = ['message' => 'An unknown server-side error occurred.'];
        if($action === '404') {
            $title = '404';
            $options['message'] = 'This page does not exists.';
        }

        return [
            'title' => $title,
            'content' => $this->_view->display($options),
        ];
	}
}