<?php

namespace Nominatim;

use Nominatim\Result\Collection;

interface ConverterInterface
{
    /**
     * Gets format for API query
     *
     * @return string
     */
    public function getFormat();

    /**
     * Gets result object
     *
     * @param string $result
     * @return Collection
     */
    public function convert($result);
}