<?php

namespace spec\Nominatim;

use Buzz\Browser;
use Buzz\Message\Response;
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

    public function it_can_search_with_structured_query(Browser $client, Response $response)
    {
        $response->getContent()->shouldBeCalled();

        $input = [
            'street' => 'pilkington avenue',
            'city' => 'birmingham'
        ];

        $client->get(sprintf(
            '%s/search?%s',
            'http://endpoint',
            http_build_query($input + ['format' => 'json'])
        ),[ 'User-Agent' => 'Nomatim PHP Library (https://github.com/nixilla/nominatim-consumer); email: not set' ])
            ->shouldBeCalled()
            ->willReturn($response);

        $query = new Query();
        $query->setStructuredQuery($input);
        $this->search($query)->shouldReturnAnInstanceOf('Nominatim\Result\Collection');
    }

    public function it_can_search_with__query(Browser $client, Response $response)
    {
        $response->getContent()->shouldBeCalled();

        $client->get(sprintf(
            '%s/search?%s',
            'http://endpoint',
            http_build_query(['q' => 'pilkington avenue, birmingham', 'format' => 'json'])
        ),[ 'User-Agent' => 'Nomatim PHP Library (https://github.com/nixilla/nominatim-consumer); email: not set' ])
            ->shouldBeCalled()
            ->willReturn($response);

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
