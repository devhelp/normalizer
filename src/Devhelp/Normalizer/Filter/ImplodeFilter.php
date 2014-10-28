<?php

namespace Devhelp\Normalizer\Filter;


use Devhelp\Normalizer\Exception\FilterException;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;

class ImplodeFilter extends BaseFilter
{

    /**
     * @var PropertyAccessorInterface
     */
    private $propertyAccessor;

    public function __construct(PropertyAccessorInterface $propertyAccessor)
    {
        $this->propertyAccessor = $propertyAccessor;
    }

    public function filter($previous, $data)
    {
        $template = $this->getPathTemplate($data);

        $pieces = array();

        foreach ($this->options['pieces'] as $piece) {
            if ($piece === '@previous') {
                $pieces[] = $previous;
            } else {
                $path = str_replace('%value%', $piece, $template);
                $pieces[] = $this->propertyAccessor->getValue($data, $path);
            }
        }

        return implode($this->glue, $pieces);
    }

    private function getPathTemplate($data)
    {
        if (is_array($data)) {
            $accessor = '[%value%]';
        } elseif (is_object($data)) {
            $accessor = '%value%';
        } else {
            throw new FilterException('Either array or object expected');
        }

        return $accessor;
    }
} 