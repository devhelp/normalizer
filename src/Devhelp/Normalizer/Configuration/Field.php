<?php

namespace Devhelp\Normalizer\Configuration;


use Devhelp\Normalizer\Filter\FilterChain;

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

    /**
     * @return FilterChain
     */
    public function getFilterChain()
    {
        return $this->filterChain;
    }
}
