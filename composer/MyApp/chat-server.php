<?php
	use Ratchet\Server\IoServer;
	use Ratchet\Http\HttpServer;
	use Ratchet\WebSocket\WsServer;

	require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
	require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'MyApp' . DIRECTORY_SEPARATOR . 'Chat.php';

	$server = IoServer::factory(
		new HttpServer(
            new WsServer(
                new MyApp\Chat()
            )
        ),
		8080
	);

	$server->run();