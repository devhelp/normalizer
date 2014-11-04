<?php

namespace Devhelp\Normalizer\Fields\Filter;


class ConcatenateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $reader;

    protected function setUp()
    {
        $this->reader = $this->getMockBuilder('Devhelp\Normalizer\Fields\PathsReader')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @test
     */
    function it_implodes_values_read_from_data()
    {
        $filter = new Concatenate($this->reader);
        $filter->setGlue(' ');

        $this->reader
            ->expects($this->any())
            ->method('readFrom')
            ->willReturn(array('a', 'b', 'c'));

        $this->assertSame('a b c', $filter->filter(array('some data')));
    }
}
