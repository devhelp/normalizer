<?php

namespace Devhelp\Normalizer\Validator;


class HasKeysValidatorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @dataProvider providerValidate
     */
    function it_validates($requiredKeys, $data, $expected)
    {
        $validator = new HasKeysValidator($requiredKeys);

        $this->assertSame($expected, $validator->validate($data));
    }

    public function providerValidate()
    {
        return array(
            array(
                array('a', 'b', 'c'),
                array('a' => 1, 'b' => 2, 'c' => 3),
                true,
            ),
            array(
                array(),
                array('a' => 1, 'b' => 2, 'c' => 3),
                true,
            ),
            array(
                array('a', 'b', 'c'),
                array('a' => 1, 'c' => 3),
                false,
            ),
            array(
                array('a', 'b', 'c'),
                array(),
                false,
            ),
            array(
                array('a', 'b', 'c'),
                new \stdClass(),
                false,
            ),
        );
    }
}
 