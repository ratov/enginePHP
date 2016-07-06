<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:18
 */
class ValidateActivation extends Validator
{
    const MAX_LEN = 100;

    protected function validate()
    {
        $data = $this->data;
        if(mb_strlen($data) > self::MAX_LEN)
            $this->setError(self::CODE_UNKNOWN);
    }
}