<?php

namespace Devhelp\Normalizer;

use Devhelp\Normalizer\Configuration\Matcher;
use Devhelp\Normalizer\Exception\ConfigurationDoesNotExistsException;

class Normalizer
{
    /**
     * @var Matcher
     */
    private $matcher;

    public function normalize($data)
    {
        $configuration = $this->matcher->match($data);

        if (!$configuration) {
            throw new ConfigurationDoesNotExistsException('Normalizer configuration was not found');
        }

        $normalized = array();

        foreach ($configuration->getFields() as $field) {
            $normalized[$field->getName()] = $field->getFilterChain()->filter($data);
        }

        return $configuration->getFactory()->create($normalized);
    }
}
