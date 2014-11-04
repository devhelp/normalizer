<?php

namespace Devhelp\Normalizer\Fields\Filter;


use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

class Property extends AbstractFilter
{

    /**
     * @var PropertyAccessorInterface
     */
    private $accessor;

    private $property;

    public function __construct(PropertyAccessorInterface $accessor)
    {
        $this->accessor = $accessor;
    }

    public function setProperty($property)
    {
        $this->property = $property;
    }

    protected function doFilter($data)
    {
        return $this->accessor->getValue($data, $this->property);
    }
}
