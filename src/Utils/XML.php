<?php

declare(strict_types = 1);
namespace PokeWeb\Utils;

/**
 * Helper functions to deal with the log file.
 */
abstract class XML {
    /**
     * The location of the log file.
     */
    const LOG_FILE_LOCATION = './log.xml';

    /**
     * Get an instance of a DOMDocument with the log file loaded into it.
     * 
     * @return \DOMDocument A DOMDocument instance with the log file loaded.
     */
    public static function getDomDocument(): \DOMDocument {
        $doc = new \DOMDocument();
        $doc->load(XML::LOG_FILE_LOCATION);
        return $doc;
    }

    /**
     * Get an instance of a SimpleXMLElement with the log file loaded into it.
     * 
     * @return \SimpleXMLElement A SimpleXMLElement instance with the log file loaded.
     */
    public static function getSimpleXML(): \SimpleXMLElement {
        return simplexml_load_file(XML::LOG_FILE_LOCATION);
    }

    /**
     * Add an entry at the end of the log file.
     * 
     * @param string $type The type of the operation.
     * @param \DateTime $date The date of the operation.
     * @param string $desc A description of the operation.
     */
    public static function append(string $type, \DateTime $date, string $desc): void {
        $doc = XML::getDomDocument();

        $root = $doc->getElementsByTagName('operations')->item(0);
        $entry = $doc->createElement('operation');

        $entry->appendChild($doc->createElement('type', $type));
        $entry->appendChild($doc->createElement('horodate', $date->format('Y-m-d H:i:s')));
        $entry->appendChild($doc->createElement('desc', $desc));

        $root->appendChild($entry);

        $file = fopen(XML::LOG_FILE_LOCATION, 'w');
        fwrite($file, $doc->saveXML());
        fclose($file);
    }
}