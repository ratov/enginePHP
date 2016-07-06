<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:14
 */
abstract class Module extends AbstractModule
{
    public function __construct()
    {
        parent::__construct(new View(Config::DIR_TMPL));
    }
}