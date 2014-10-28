<?php

namespace Devhelp\Normalizer\Configuration;


use Devhelp\Normalizer\Factory\FactoryInterface;
use Devhelp\Normalizer\Validator\ValidatorInterface;

class Configuration
{
    private $name;
    private $fields;
    private $validator;
    private $factory;

    public function __construct($name, array $fields, ValidatorInterface $validator, FactoryInterface $factory)
    {
        $this->name = $name;
        $this->fields = $fields;
        $this->validator = $validator;
        $this->factory = $factory;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return FactoryInterface
     */
    public function getFactory()
    {
        return $this->factory;
    }

    public function supports($data)
    {
        return $this->validator->validate($data);
    }
}
