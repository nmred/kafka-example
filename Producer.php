<?php
require './vendor/autoload.php';
date_default_timezone_set('PRC');

$config = \Kafka\ProducerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('127.0.0.1:9192');
$config->setBrokerVersion('0.9.0.1');
$config->setRequiredAck(1);
$config->setIsAsyn(false);
$config->setProduceInterval(500);
$producer = new \Kafka\Producer(function() {
	return array(
		array(
			'topic' => 'test',
			'value' => 'test....message.',
			'key' => 'testkey',
			),
	);
});
$producer->success(function($result) {
	var_dump($result);
});
$producer->error(function($errorCode, $context) {
		var_dump($errorCode);
});
$producer->send();
