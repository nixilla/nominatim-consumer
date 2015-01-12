<?php

namespace Nominatim;

use Nominatim\Converter\Json;

class Consumer
{
    /**
     * @var \Buzz\Browser
     */
    protected $client;

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var ConverterInterface
     */
    protected $converter;

    /**
     * @var array
     */
    protected $headers = [];

    public function __construct($client, $endpoint, $email = null)
    {
        $this->client = $client;
        $this->endpoint = $endpoint;

        $this->headers = [
            'User-Agent' => sprintf('Nomatim PHP Library (https://github.com/nixilla/nominatim-consumer); email: %s', $email ?: 'not set')
        ];
    }

    public function search(Query $query)
    {
        if($query->getStructuredQuery())
            return $this->runStructuredQuery($query);

        if($query->getQuery())
            return $this->runQuery($query);

        return 1;
    }

    protected function runQuery(Query $query)
    {
        $input = [
            'q' => $query->getQuery(),
            'format' => $this->getConverter()->getFormat()
        ];

        $input = array_merge($input, $query->getParams());

        $response = $this->client->get(sprintf('%s/search?%s', $this->endpoint, http_build_query($input)), $this->headers);

        return $this->getConverter()->convert($response->getContent());
    }

    protected function runStructuredQuery(Query $query)
    {
        $input = $query->getStructuredQuery() + [
            'format' => $this->getConverter()->getFormat()
        ];

        $response = $this->client->get(sprintf('%s/search?%s', $this->endpoint, http_build_query($input)), $this->headers);

        return $this->getConverter()->convert($response->getContent());
    }

    public function getConverter()
    {
        if( ! $this->converter)
            $this->converter = new Json();
        return $this->converter;
    }

    public function setConverter($converter)
    {
        $this->converter = $converter;

        return $this;
    }
}
