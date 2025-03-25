<?php

use App\Kernel;
use Nyholm\Psr7\Factory\Psr17Factory;
use Spiral\RoadRunner\Http\PSR7Worker;
use Spiral\RoadRunner\Worker;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';

// Boot .env
if (file_exists(__DIR__ . '/.env')) {
    (new Dotenv())->bootEnv(__DIR__ . '/.env');
}

// Symfony kernel
$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);

// PSR-17/7 Factories
$psr17Factory = new Psr17Factory();
$psrHttpFactory = new PsrHttpFactory($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
$symfonyFactory = new HttpFoundationFactory();

// Create worker
$worker = new PSR7Worker(
    Worker::create(),
    $psr17Factory,
    $psr17Factory,
    $psr17Factory
);

while ($req = $worker->waitRequest()) {
    try {
        $psrRequest = $req;
        $symfonyRequest = $symfonyFactory->createRequest($psrRequest);

        $response = $kernel->handle($symfonyRequest);
        $kernel->terminate($symfonyRequest, $response);

        $psrResponse = $psrHttpFactory->createResponse($response);
        $worker->respond($psrResponse);
    } catch (\Throwable $e) {
        $worker->getWorker()->error((string) $e);
    }
}
