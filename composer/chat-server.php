<?php
use Ratchet\Server\IoServer;
use \MyApp\Chat;
    require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'composer' . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
    $server = IoServer::factory(
        new Chat(),
        8080
    );
    $server->run();