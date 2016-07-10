<?php
/**
 * Created by PhpStorm.
 * User: Kirill
 * Date: 10.07.2016
 * Time: 20:11
 */

class ValidateCourseType extends Validator {

    const MAX_COURSETYPE = 3;

    protected function validate() {
        $data = $this->data;
        if (!is_int($data)) $this->setError(self::CODE_UNKNOWN);
        else {
            if (($data < 1) || ($data > self::MAX_COURSETYPE)) $this->setError(self::CODE_UNKNOWN);
        }
    }

}