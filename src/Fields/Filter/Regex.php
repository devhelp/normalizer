<?php

namespace Devhelp\Normalizer\Fields\Filter;


class Regex extends AbstractFilter
{

    private $pattern;

    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    protected function doFilter($data)
    {
        preg_match($this->pattern, $data, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }
}
