<?php

namespace Devhelp\Normalizer\Fields;


class FieldsNormalizerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     */
    function it_returns_array_with_field_name_and_filter_result_pairs()
    {
        $matcher = $this->getMockBuilder('Devhelp\Normalizer\Fields\Matcher\MatcherInterface')
            ->disableOriginalConstructor()
            ->getMock();

        $fieldA = $this->getFieldMock('one', 1);
        $fieldB = $this->getFieldMock('two', 2);
        $fieldC = $this->getFieldMock('three', 3);

        $fields = array($fieldA, $fieldB, $fieldC);

        $fieldsNormalizer = new FieldsNormalizer($matcher, $fields);

        $normalized = array(
            'one' => 1,
            'two' => 2,
            'three' => 3
        );

        $someDataToNormalize = array();

        $this->assertSame($normalized, $fieldsNormalizer->normalize($someDataToNormalize));
    }

    private function getFieldMock($name, $filterResult)
    {
        $field = $this->getMockBuilder('Devhelp\Normalizer\Fields\Source\Field')
            ->disableOriginalConstructor()
            ->getMock();

        $field
            ->expects($this->any())
            ->method('getName')
            ->willReturn($name);

        $field
            ->expects($this->any())
            ->method('filter')
            ->willReturn($filterResult);

        return $field;
    }
}
