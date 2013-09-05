<?php

namespace spec\Nominatim;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class QuerySpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('Nominatim\Query');
    }

    public function it_sets_query()
    {
        $this->setQuery('pilkington avenue, birmingham')->shouldReturn($this);
        $this->getQuery()->shouldReturn('pilkington avenue, birmingham');
    }

    public function it_sets_structured_query()
    {
        $params = [ 'address' => 'test' ];
        $this->setStructuredQuery($params)->shouldReturn($this);
        $this->getStructuredQuery()->shouldReturn($params);
    }
}
