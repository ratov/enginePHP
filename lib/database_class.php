<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 05.07.2016
 * Time: 20:23
 */
class DataBase extends AbstractDataBase
{
    private static $db;

    public function getDBO()
    {
        if(self::$db == null)
            self::$db = new DataBase(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_NAME, Config::DB_SYM_QUERY, Config::DB_PREFIX);
        return self::$db;
    }
}