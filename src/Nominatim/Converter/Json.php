<?php

namespace Nominatim\Converter;

use Nominatim\ConverterInterface;
use Nominatim\Result\Collection;
use Nominatim\Result\Item;

class Json implements ConverterInterface
{
    /**
     * Gets format for API query
     *
     * @return string
     */
    public function getFormat()
    {
        return 'json';
    }

    /**
     * @param $result
     * @return Collection
     */
    public function convert($result)
    {
        $collection = new Collection([]);

        $list = json_decode($result, true);

        if(count($list))
        {
            foreach($list as $i)
            {
                $item = new Item($i);
                $collection->append($item);
            }
        }

        return $collection;
    }
}
