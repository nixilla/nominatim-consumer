<?php

namespace spec\Nominatim\Converter;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class JsonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nominatim\Converter\Json');
    }

    function it_returns_format()
    {
        $this->getFormat()->shouldReturn('json');
    }
}
