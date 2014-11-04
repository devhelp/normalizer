<?php

namespace Devhelp\Normalizer\Fields\Filter;


class ChainTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function it_passes_previous_result_to_next_filter_and_returns_the_last_filter_result()
    {
        $filterChain = new Chain();

        $someDataToFilter = array();
        $filterResultA = 'filter result A';
        $filterResultB = 'filter result B';
        $filterResultC = 'filter result C';

        $filterA = $this->getFilter($someDataToFilter, $filterResultA);
        $filterB = $this->getFilter($filterResultA, $filterResultB);
        $filterC = $this->getFilter($filterResultB, $filterResultC);

        $filterChain
            ->add($filterA)
            ->add($filterB)
            ->add($filterC);

        $this->assertSame($filterResultC, $filterChain->filter($someDataToFilter));
    }

    private function getFilter($data, $filtered)
    {
        $filter = $this->getMockBuilder('Devhelp\Normalizer\Fields\Filter\FilterInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $filter
            ->expects($this->once())
            ->method('filter')
            ->with($data)
            ->willReturn($filtered);

        return $filter;
    }
}
