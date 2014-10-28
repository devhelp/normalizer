<?php

namespace Devhelp\Normalizer\Configuration;


class Matcher
{

    /**
     * @var array
     */
    private $configurations;

    /**
     * @param $data
     * @return Configuration
     */
    public function match($data)
    {
        foreach ($this->configurations as $configuration) {
            if ($configuration->supports($data)) {
                return $configuration;
            }
        }

        return null;
    }
}
