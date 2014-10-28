<?php

namespace Devhelp\Normalizer\Validator;


class HasKeysValidator implements ValidatorInterface
{
    private $requiredKeys;

    public function __construct(array $requiredKeys)
    {
        $this->requiredKeys = $requiredKeys;
    }

    public function validate($data)
    {
        if (is_array($data)) {
            $diff = array_diff($this->requiredKeys, array_keys($data));
            return !count($diff) ;
        }

        return false;
    }
}
