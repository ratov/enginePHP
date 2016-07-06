<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:25
 */
class ValidateBoolean extends Validator
{
    protected function validate()
    {
        $data = $this->data;
        if(($data != 0) && ($data != 1))
            $this->setError(self::CODE_UNKNOWN);
    }
}