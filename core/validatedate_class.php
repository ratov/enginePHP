<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:28
 */
class ValidateDate extends Validator
{
    protected function validate()
    {
        $data = $this->data;
        if(!is_null($data) && strtotime($data) === false)
            $this->setError(self::CODE_UNKNOWN);
    }
}