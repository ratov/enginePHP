<?php

/*
 * Класс отвечающий за работу с объектами БД
 * */

abstract class AbstractObjectDB
{
    const TYPE_TIMESTAMP = 1;
    const TYPE_IP = 2;

    private static $types = array(self::TYPE_TIMESTAMP, self::TYPE_IP);
    protected static $db = null;

    private $format_date = "";

    private $id = null;
    private $properties = array();

    protected $table_name = "";

    public function __construct($table_name, $form_date)
    {
        $this->table_name = $table_name;
        $this->format_date = $form_date;
    }

    public static function setDB($db)
    {
        self::$db = $db;
    }

    public function load($id)
    {
        $id = (int)$id;
        if($id < 0) return false;
        $select = new Select();
        $select = $select->from($this->table_name, $this->getSelectFields())->where("`id` = " . self::$db->getSQ(), array($id));
        $row = self::$db->selectRow($select);
        if(!$row) return false;
        if($this->init($row)) return $this->postLoad();
    }

    public function init($row)
    {
        foreach($this->properties as $key => $value) {
            $val = $row[$key];
            switch($value["type"]) {
                case self::TYPE_TIMESTAMP:
                    if(!is_null($val)) $val = strftime($this->format_date, $val);
                    break;
                case self::TYPE_IP:
                    if(!is_null($val)) $val = long2ip($val);
                    break;
            }
            $this->properties[$key]["value"] = $val;
        }
        $this->id = $row["id"];
        return $this->postInit();
    }

    public function isSaved()
    {
        return $this->getID() > 0;
    }

    public function getID()
    {
        return (int) $this->id;
    }

    public function save() {
        $update = $this->isSaved();
        if ($update) $commit = $this->preUpdate();
        else $commit = $this->preInsert();
        if (!$commit) return false;
        $row = array();
        foreach ($this->properties as $key => $value) {
            switch ($value["type"]) {
                case self::TYPE_TIMESTAMP:
                    if (!is_null($value["value"])) $value["value"] = strtotime($value["value"]);
                    break;
                case self::TYPE_IP:
                    if (!is_null($value["value"])) $value["value"] = ip2long($value["value"]);
                    break;
            }
            $row[$key] = $value["value"];
        }
        if (count($row) > 0) {
            if ($update) {
                $success = self::$db->update($this->table_name, $row, "`id` = ".self::$db->getSQ(), array($this->getID()));
                if (!$success) throw new Exception();
            }
            else {
                $this->id = self::$db->insert($this->table_name, $row);
                if (!$this->id) throw new Exception();
            }
        }
        if ($update) return $this->postUpdate();
        return $this->postInsert();
    }
}