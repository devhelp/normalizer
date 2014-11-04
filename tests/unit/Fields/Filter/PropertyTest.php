<?php

namespace Devhelp\Normalizer\Fields\Filter;


class PropertyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \PHPUnit_Framework_MockObject_MockObject
     */
    private $accessor;

    protected function setUp()
    {
        $this->accessor = $this->getMockBuilder('Symfony\Component\PropertyAccess\PropertyAccessorInterface')
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @test
     */
    function it_returns_value_read_with_property_accessor()
    {
        $property = 'property';
        $data = array('some data');
        $propertyValue = 'property value';

        $this->accessor
            ->expects($this->once())
            ->method('getValue')
            ->with($data, $property)
            ->willReturn($propertyValue);

        $filter = new Property($this->accessor);

        $filter->setProperty($property);

        $this->assertSame($propertyValue, $filter->filter($data));
    }
}
