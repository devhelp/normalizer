<?php

namespace Devhelp\Normalizer\Core;


class NormalizerChainTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function it_returns_data_normalized_by_first_normalizer_that_supports_the_data()
    {
        $normalizedData = array('some normalized data');

        $normalizerA = $this->getNormalizer(false);

        $normalizerA
            ->expects($this->never())
            ->method('normalize');

        $normalizerB = $this->getNormalizer(true);

        $normalizerB
            ->expects($this->once())
            ->method('normalize')
            ->willReturn($normalizedData);

        $normalizerC = $this->getNormalizer(true);

        $normalizerC
            ->expects($this->never())
            ->method('normalize');

        $factory = $this->getMockBuilder('Devhelp\Normalizer\Core\Factory\FactoryInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $factoryResult = 'some factory result';

        $factory
            ->expects($this->once())
            ->method('create')
            ->with($normalizedData)
            ->willReturn($factoryResult);

        $normalizerChain = new NormalizerChain($factory, array($normalizerA, $normalizerB, $normalizerC));

        $someDataToNormalize = array();

        $this->assertSame($factoryResult, $normalizerChain->normalize($someDataToNormalize));
    }

    /**
     * @test
     * @expectedException Devhelp\Normalizer\Core\Exception\NormalizerException
     */
    function it_throws_exception_if_none_of_the_normalizers_supports_data()
    {
        $normalizer = $this->getNormalizer(false);

        $factory = $this->getMockBuilder('Devhelp\Normalizer\Core\Factory\FactoryInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $normalizerChain = new NormalizerChain($factory, array($normalizer));

        $someDataToNormalize = array();

        $normalizerChain->normalize($someDataToNormalize);
    }

    /**
     * @test
     * @expectedException Devhelp\Normalizer\Core\Exception\NormalizerException
     */
    function it_throws_exception_if_there_are_no_normalizers()
    {
        $factory = $this->getMockBuilder('Devhelp\Normalizer\Core\Factory\FactoryInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $normalizerChain = new NormalizerChain($factory, array());

        $someDataToNormalize = array();

        $normalizerChain->normalize($someDataToNormalize);
    }

    private function getNormalizer($supports)
    {
        $normalizer = $this->getMockBuilder('Devhelp\Normalizer\Core\NormalizerInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $normalizer
            ->expects($this->any())
            ->method('supports')
            ->willReturn($supports);

        return $normalizer;
    }
}
