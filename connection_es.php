<?php

use Elasticsearch\ClientBuilder;

require 'vendor/autoload.php';

$hosts = [
	'host' => 'http://localhost:9200/',
	'user' => 'elastic',
	'pass' => 'elastic2022',
];

$client = ClientBuilder::create()
	->setHosts(['http://localhost:9200'])
	->setBasicAuthentication('elastic', 'elastic2022')
	->build();
