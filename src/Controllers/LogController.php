<?php

declare(strict_types = 1);
namespace PokeWeb\Controllers;

use PokeWeb\Views\IView;
use PokeWeb\Utils\XML;
use PokeWeb\Views\LogView;

/**
 * The controller for the /log route.
 */
class LogController implements IController {
    private IView $_view;

    public function __construct() {
        $this->_view = new LogView();
    }

	public function render(string $action, string $id): array {
        // Each array represent a logging category.
        $view = [];
        $edit = [];
        $other = [];

        // Populate the arrays
        foreach(XML::getSimpleXML() as $entry) {
            $entryArray = ['date' => $entry->horodate->__toString(), 'desc' => $entry->desc->__toString()];
            switch($entry->type) {
                case 'view': {
                    $view[] = $entryArray;
                    break;
                }

                case 'edit': {
                    $edit[] = $entryArray;
                    break;
                }

                case 'other': {
                    $other[] = $entryArray;
                    break;
                }
            }
        }

        return [
            'title' => 'Logs',
            'content' => $this->_view->display([
                'view' => $view,
                'edit' => $edit,
                'other' => $other,
            ])
        ];
	}
}