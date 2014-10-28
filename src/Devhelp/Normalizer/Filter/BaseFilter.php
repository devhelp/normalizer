<?php

namespace Devhelp\Normalizer\Filter;


abstract class BaseFilter implements FilterInterface
{
    protected $options;

    public function setOptions(array $options)
    {
        $this->options = $options;
    }
} 