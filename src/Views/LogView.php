<?php

declare(strict_types = 1);
namespace PokeWeb\Views;

/**
 * The view for the /log route.
 * 
 * Options:
 * - view : An array containing every log event for the "view" category.
 * - edit : An array containing every log event for the "edit" category.
 * - other : An array containing every log event for the "other" category.
 */
class LogView implements IView {
	public function display(array $options): string {
        ob_start();

        echo '<h1>View</h1>';
        echo LogView::getTableForArray($options['view']);

        echo '<h1>Edit</h1>';
        echo LogView::getTableForArray($options['edit']);

        echo '<h1>Other</h1>';
        echo LogView::getTableForArray($options['other']);

        return ob_get_clean();
	}

    private static function getTableForArray(array $events): string {
        $content = '';

        foreach($events as $entry) {
            $content .= '<tr>';
            $content .= '<td>' . htmlspecialchars($entry['date']) . '</td>';
            $content .= '<td>' . htmlspecialchars($entry['desc']) . '</td>';
            $content .= '</tr>';
        }

        return <<<IDF
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event Description</th>
                    </tr>
                </thead>
                <tbody>
                    $content
                </tbody>
            </table>
        IDF;
    }
}