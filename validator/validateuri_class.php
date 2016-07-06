<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 06.07.2016
 * Time: 15:04
 */

class ValidateURI extends Validator {

    const MAX_LEN = 255;

    protected function validate() {
        $data = $this->data;
        if (mb_strlen($data) > self::MAX_LEN) $this->setError(self::CODE_UNKNOWN);
        else {
            $pattern = "~^(?:/[a-z0-9.,_@%&?+=\~/-]*)?(?:#[^ '\"&<>]*)?$~i";
            if (!preg_match($pattern, $data)) $this->setError(self::CODE_UNKNOWN);
        }
    }

}