<?php

namespace Devhelp\Normalizer\Fields;


use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

class PathsReader
{
    protected $paths = array();

    /**
     * @var PropertyAccessorInterface
     */
    protected $accessor;

    public function __construct(PropertyAccessorInterface $accessor)
    {
        $this->accessor = $accessor;
    }

    public function setPaths(array $paths)
    {
        $this->paths = $paths;
    }

    public function readFrom($data)
    {
        $values = array();

        foreach ($this->paths as $path) {
            $values[] = $this->accessor->getValue($data, $path);
        }

        return $values;
    }
}
