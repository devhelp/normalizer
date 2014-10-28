<?php

namespace Devhelp\Normalizer\Validator;


interface ValidatorInterface
{
    /**
     * @param $data
     * @return boolean
     */
    public function validate($data);
} 