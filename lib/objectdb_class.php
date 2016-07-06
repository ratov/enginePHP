<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 12:58
 */
abstract class ObjectDB extends AbstractObjectDB
{
    private static $month = array("янв", "фев", "март", "апр", "май", "июнь", "июль", "авг", "сен", "окт", "ноя", "дек");

    public function __construct($table)
    {
        parent::__construct($table, Config::FORMAT_DATE);
    }

    protected static function getMonth($date = false)
    {
        if($date) $date = strtotime($date);
        else $date = time();
        return self::$month[date("n", $date) - 1];
    }

    public function preEdit($field, $value)
    {
        return true;
    }

    public function postEdit($field, $value)
    {
        return true;
    }
}