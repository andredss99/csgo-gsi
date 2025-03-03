<?php

namespace App;

require_once "../vendor/autoload.php";

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$server = new Server('127.0.0.1', 9501);

$server->on("start", function (Server $server) {
    echo "OpenSwoole http server is started at http://127.0.0.1:9501\n";
});

$server->on("request", function (Request $request, Response $response) {
    echo "Request: {$request->rawContent()}";
    $response->header('Content-Type', 'application/json');
    $response->end($request->getContent());
});

$server->start();
