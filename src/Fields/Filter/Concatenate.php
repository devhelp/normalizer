<?php

namespace Devhelp\Normalizer\Fields\Filter;


use Devhelp\Normalizer\Fields\PathsReader;

class Concatenate extends AbstractFilter
{
    /**
     * @var PathsReader
     */
    private $reader;

    public function __construct(PathsReader $reader)
    {
        $this->reader = $reader;
        $this->glue = '';
    }

    public function setPaths(array $paths)
    {
        $this->reader->setPaths($paths);
    }

    public function setGlue($glue)
    {
        $this->glue = $glue;
    }

    protected function doFilter($data)
    {
        $values = $this->reader->readFrom($data);
        return implode($this->glue, $values);
    }
}
