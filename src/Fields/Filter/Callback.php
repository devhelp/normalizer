<?php

namespace Devhelp\Normalizer\Fields\Filter;


class Callback extends AbstractFilter
{
    private $callback;

    public function __construct($callback)
    {
        if (!is_callable($callback)) {
            throw new \InvalidArgumentException('Callable expected');
        }

        $this->callback = $callback;
    }

    protected function doFilter($data)
    {
        return call_user_func($this->callback, $data);
    }
}
