<?php
	use Ratchet\Server\IoServer;

	require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
	require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'MyApp' . DIRECTORY_SEPARATOR . 'Chat.php';

	$server = IoServer::factory(
		new MyApp\Chat(),
		8080
	);

	$server->run();