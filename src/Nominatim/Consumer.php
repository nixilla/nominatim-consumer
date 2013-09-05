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

    public function __construct($client, $endpoint)
    {
        $this->client = $client;
        $this->endpoint = $endpoint;
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
        // @todo call api


        return $this->getConverter()->convert('[{}]');
    }

    protected function runStructuredQuery(Query $query)
    {
        // @todo call api

        return $this->getConverter()->convert('[{}]');
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
