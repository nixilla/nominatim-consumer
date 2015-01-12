<?php

namespace Nominatim;

class Query
{
    protected $query;

    protected $structuredQuery;

    protected $params = array();

    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function setStructuredQuery($query)
    {
        $this->structuredQuery = $query;

        return $this;
    }

    public function getStructuredQuery()
    {
        return $this->structuredQuery;
    }

    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
    }

    public function getParams()
    {
        return $this->params;
    }
}
