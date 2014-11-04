<?php

namespace Devhelp\Normalizer\Fields\Source;


use Devhelp\Normalizer\Fields\Filter\FilterInterface;

class Field
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var FilterChain
     */
    private $filterChain;

    public function __construct($name)
    {
        $this->name = $name;
        $this->filterChain = new FilterChain();
    }

    public function getName()
    {
        return $this->name;
    }

    public function addFilter(FilterInterface $filter)
    {
        $this->filterChain->add($filter);
    }

    public function filter($data)
    {
        return $this->filterChain->filter($data);
    }
}
