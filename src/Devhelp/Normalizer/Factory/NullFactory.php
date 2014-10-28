<?php

namespace Devhelp\Normalizer\Factory;


class NullFactory implements FactoryInterface
{
    public function create(array $data)
    {
        return $data;
    }
}
