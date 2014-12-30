<?php
require_once './vendor/autoload.php';

$client = new Buzz\Browser(new Buzz\Client\Curl());
$consumer = new \Nominatim\Consumer($client, 'http://nominatim.openstreetmap.org');

$query = new \Nominatim\Query();
$query->setQuery('pilkington avenue,birmingham');
$query->setParam('addressdetails', 1);
$result = $consumer->search($query);

echo "\n===================\n";
printf("\n== Found %s items ==\n", count($result));
echo "\n===================\n";

foreach($result as $item)
{
    printf('%s @ lat:%s, lon: %s', $item['display_name'], $item['lat'], $item['lon']);
    echo "\n===================\n";
}

$query = new \Nominatim\Query();
$query->setStructuredQuery(['street' => 'Cromwell Road', 'city' => 'London']);

$result = $consumer->search($query);

echo "\n===================\n";
printf("\n== Found %s items ==\n", count($result));
echo "\n===================\n";

foreach($result as $item)
{
    printf('%s @ lat:%s, lon: %s', $item['display_name'], $item['lat'], $item['lon']);
    echo "\n===================\n";
}

