<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 10.07.2016
 * Time: 20:13
 */

class ValidateIDs extends Validator {

    protected function validate() {
        $data = $this->data;
        if (is_null($data)) return;
        if (!preg_match("/^\d+(,\d+)*\d?$/", $data)) $this->setError(self::CODE_UNKNOWN);
    }

}