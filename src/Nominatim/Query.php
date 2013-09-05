<?php

namespace Nominatim;

class Query
{
    protected $query;

    protected $structuredQuery;

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
}
