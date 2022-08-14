<?php

require_once('vendor/autoload.php');

$api_url = "https://www.udemy.com/api-2.0/";

use Guzzle\Http\Message\Request;

$client = new \Guzzle\Http\Client(['base_url' => 'udemy.com']);
$client->createRequest('GET', $api_url, ['Authorization' => base64_encode('ULLcEQDvs63nOWnFTW0uGKAGrrtlhDV4Hs9gDIQH:2f2tNHwzH3hn8ygDrtLhsGpg1fehrpAeIayLDnKn6L8PzARXBQ5ygsHimIPjfZpscXMQF12QIZxMtLcDw1Dtd5csQBYkOyx1w8nqvr5RDgzSe8C63PnKAMCFPcWMLpGe')]);

