<?php

namespace Devhelp\Normalizer\Filter;


class FilterChain
{
    private $filters;

    public function __construct()
    {
        $this->filters = array();
    }

    public function filter($data)
    {
        $filtered = null;

        $this->prioritize();

        foreach ($this->filters as $filter) {
            $filtered = $filter->filter($filtered, $data);
        }

        return $filtered;
    }

    public function add(FilterInterface $filter, $priority = 0)
    {
        $this->filters[$priority][] = $filter;
    }

    private function prioritize()
    {
        krsort($this->filters);
    }
}
