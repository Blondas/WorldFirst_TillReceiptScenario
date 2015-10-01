<?php
require_once('TillItem.php');
require_once('Till.php');

class Test {
    public static function runTillScenario($json_file) {
        $string = file_get_contents($json_file);
        $parsed = json_decode($string, true);

        $till = new Till();
        foreach ($parsed as $item_name => $item_price) {
            $tillItem = new TillItem($item_name, $item_price);
            $till->addItem($tillItem);
        }

        $till->printTill();
    }
}