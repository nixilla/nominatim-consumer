<?php

namespace spec\Nominatim\Result;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CollectionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Nominatim\Result\Collection');
    }
}
