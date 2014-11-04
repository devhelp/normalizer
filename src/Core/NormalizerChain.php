<?php

namespace Devhelp\Normalizer\Core;

use Devhelp\Normalizer\Core\Exception\NormalizerException;
use Devhelp\Normalizer\Core\Factory\FactoryInterface;

class NormalizerChain implements NormalizerInterface
{

    /**
     * Factory class that will be used to create normalized object
     *
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var array
     */
    private $normalizers = array();

    public function __construct(FactoryInterface $factory, $normalizers = array())
    {
        $this->factory = $factory;
        foreach ($normalizers as $normalizer) {
            $this->addNormalizer($normalizer);
        }
    }

    public function addNormalizer(NormalizerInterface $normalizer)
    {
        $this->normalizers[] = $normalizer;
    }

    public function supports($data)
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer->supports($data)) {
                return true;
            }
        }

        return false;
    }

    public function normalize($data)
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer->supports($data)) {
                return $this->factory->create($normalizer->normalize($data));
            }
        }

        throw new NormalizerException('None of the normalizers supports the data');
    }
}
