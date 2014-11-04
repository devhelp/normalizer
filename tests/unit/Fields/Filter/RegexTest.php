<?php

namespace Devhelp\Normalizer\Fields\Filter;


class RegexTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @test
     * @dataProvider filterResults
     */
    function it_returns_pattern_match($data, $pattern, $expected)
    {
        $filter = new Regex();
        $filter->setPattern($pattern);

        $this->assertSame($expected, $filter->filter($data));
    }

    public function filterResults()
    {
        return array(
            array('john doe', '/.*(doe).*/', 'doe'),
            array('john doe', '/.*\s(.*)/', 'doe'),
        );
    }
}
