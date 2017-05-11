<?php
require './vendor/autoload.php';
date_default_timezone_set('PRC');

$config = \Kafka\ConsumerConfig::getInstance();
$config->setMetadataRefreshIntervalMs(10000);
$config->setMetadataBrokerList('127.0.0.1:9192');
$config->setGroupId('test');
$config->setBrokerVersion('0.9.0.1');
$config->setTopics(array('test'));
$config->setOffsetReset('earliest');
$consumer = new \Kafka\Consumer();
$consumer->start(function($topic, $part, $message) {
	var_dump($message);
});
