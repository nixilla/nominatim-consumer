<?php

namespace spec\Nominatim;

use Buzz\Browser;
use Nominatim\ConverterInterface;
use Nominatim\Query;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ConsumerSpec extends ObjectBehavior
{
    public function let(Browser $client)
    {
        $this->beConstructedWith($client, 'http://endpoint');
    }

    public function it_can_search()
    {
        $query = new Query();
        $query->setQuery('pilkington avenue, birmingham');
        $this->search($query)->shouldReturnAnInstanceOf('Nominatim\Result\Collection');
    }

    public function it_has_converter()
    {
        $this->getConverter()->shouldReturnAnInstanceOf('Nominatim\ConverterInterface');
    }

    public function it_sets_converter(ConverterInterface $converter)
    {
        $this->setConverter($converter)->shouldReturn($this);
        $this->getConverter()->shouldReturn($converter);
    }
}
