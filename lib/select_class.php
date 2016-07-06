<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 12:51
 */
class Select extends AbstractSelect
{
    public function __construct()
    {
        parent::__construct(DataBase::getDBO());
    }
}