<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 05.07.2016
 * Time: 14:49
 */

class Message {

    private $data;

    public function __construct($file) {
        $this->data = parse_ini_file($file);
    }

    public function get($name) {
        return $this->data[$name];
    }

}