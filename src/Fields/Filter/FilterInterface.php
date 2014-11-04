<?php

namespace Devhelp\Normalizer\Fields\Filter;


use Devhelp\Normalizer\Fields\Exception\FilterException;

interface FilterInterface
{
    /**
     * @param mixed $data
     * @throws FilterException
     * @return mixed
     */
    public function filter($data);
}
