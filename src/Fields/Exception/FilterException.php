<?php

namespace Devhelp\Normalizer\Fields\Exception;


class FilterException extends \Exception
{
    public function __construct($message, \Exception $previous = null)
    {
        parent::__construct($message, 0, $previous);
    }
}
