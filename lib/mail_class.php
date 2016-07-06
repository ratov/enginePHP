<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:10
 */
class Mail extends AbstractMail
{
    public function __construct()
    {
        parent::__construct(new View(Config::DIR_EMAILS), Config::ADM_EMAIL);

        $this->setFromName(Config::ADM_NAME);
    }
}