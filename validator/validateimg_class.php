<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 13:51
 */

class ValidateIMG extends Validator {

    protected function validate() {
        $data = $this->data;
        if (!is_null($data) && !preg_match("/^[a-z0-9-_]+\.(jpg|jpeg|png|gif)$/i", $data)) $this->setError(self::CODE_UNKNOWN);
    }

}