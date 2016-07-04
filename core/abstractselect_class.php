<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 04.07.2016
 * Time: 19:20
 */
class AbstractSelect
{
    private $db;
    private $from = "";
    private $where = "";
    private $order = "";
    private $limit = "";

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function from($table_name, $fields)
    {
        $table_name = $this->db->getTableName($table_name);
        $from = "";
        if($fields == "*") $from = "*";
        else {
            for($i = 0; $i < count($fields); $i++) {
                if(($pos_1 = strpos($fields[$i], "(")) !== false) {
                    $pos_2 = strpos($fields[$i], ")");
                    $from .= substr($fields[$i], 0, $pos_1) . "(`" . substr($fields[$i], $pos_1 + 1, $pos_2 - $pos_1 - 1) . "`),";
                }
                else
                    $from = "`" . $fields[$i] . "`,";
            }
            $from = substr($from, 0, -1);
        }
        $from .= " FROM `$table_name`";
        return $this;
    }
}