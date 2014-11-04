<?php

namespace Devhelp\Normalizer\Fields\Filter;


use Devhelp\Normalizer\Fields\Exception\FilterException;

abstract class AbstractFilter implements FilterInterface
{
    public function filter($data)
    {
        try {
            return $this->doFilter($data);
        } catch (\Exception $exception) {
            throw $this->wrapException($exception);
        }
    }

    protected function wrapException(\Exception $exception)
    {
        return new FilterException('There was an error while filtering the data', $exception);
    }

    abstract protected function doFilter($data);
}
