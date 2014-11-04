<?php

namespace Devhelp\Normalizer\Fields\Filter;


class CallbackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider filterResults
     */
    function it_returns_callback_result($callback, $data, $filtered)
    {
        $filter = new Callback($callback);

        $this->assertSame($filtered, $filter->filter($data));
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    function it_throws_exception_if_not_created_with_valid_callback()
    {
        new Callback(array());
    }

    public function filterResults()
    {
        $trimCallback = function ($data) {
            return trim($data);
        };

        return array(
            array('trim', ' test ', 'test'),
            array($trimCallback, ' test ', 'test'),
            array(array(new Foo(), 'trim'), ' test ', 'test'),
            array(array('Devhelp\Normalizer\Fields\Filter\Foo', 'staticTrim'), ' test ', 'test'),
        );
    }
}

class Foo
{
    public function trim($data)
    {
        return self::staticTrim($data);
    }

    public static function staticTrim($data)
    {
        return trim($data);
    }
}
