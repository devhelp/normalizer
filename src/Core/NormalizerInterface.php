<?php

namespace Devhelp\Normalizer\Core;


use Devhelp\Normalizer\Core\Exception\NormalizerException;

interface NormalizerInterface
{
    /**
     * checks whether or not $data can be normalized
     *
     * @param $data
     * @return boolean
     */
    public function supports($data);

    /**
     * normalizes $data
     *
     * @param $data
     * @throws NormalizerException
     * @return mixed
     */
    public function normalize($data);
}
