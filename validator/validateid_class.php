<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:47
 */
class ValidateID extends Validator {

    protected function validate() {
        $data = (int) $this->data;
        if (!is_null($data) && ((!is_int($data)) || ($data < 0))) $this->setError(self::CODE_UNKNOWN);
    }

}