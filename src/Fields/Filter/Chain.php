<?php

namespace Devhelp\Normalizer\Fields\Filter;


class Chain extends AbstractFilter
{
    private $filters = array();

    public function __construct(array $filters = array())
    {
        foreach ($filters as $filter) {
            $this->add($filter);
        }
    }

    protected function doFilter($data)
    {
        $filtered = $data;

        foreach ($this->filters as $filter) {
            $filtered = $filter->filter($filtered);
        }

        return $filtered;
    }

    public function add(FilterInterface $filter)
    {
        $this->filters[] = $filter;
        return $this;
    }
}
