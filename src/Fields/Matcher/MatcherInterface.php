<?php

namespace Devhelp\Normalizer\Fields\Matcher;


interface MatcherInterface
{
    /**
     * @param $data
     * @return boolean
     */
    public function match($data);
}
