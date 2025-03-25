<?php

use App\Kernel;
use Nyholm\Psr7\Factory\Psr17Factory;
use Spiral\RoadRunner\Http\PSR7Worker;
use Spiral\RoadRunner\Worker;
use Symfony\Bridge\PsrHttpMessage\Factory\PsrHttpFactory;
use Symfony\Bridge\PsrHttpMessage\Factory\HttpFoundationFactory;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

if (file_exists(dirname(__DIR__) . '/.env')) {
    (new Dotenv())->bootEnv(dirname(__DIR__) . '/.env');
}

$kernel = new Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);

$psr17Factory = new Psr17Factory();
$psrHttpFactory = new PsrHttpFactory($psr17Factory, $psr17Factory, $psr17Factory, $psr17Factory);
$symfonyFactory = new HttpFoundationFactory();

$worker = new PSR7Worker(Worker::create());

while ($req = $worker->waitRequest()) {
    try {
        // Convertir PSR-7 → Symfony
        $symfonyRequest = $symfonyFactory->createRequest($req->getRequest());

        $response = $kernel->handle($symfonyRequest);
        $kernel->terminate($symfonyRequest, $response);

        // Convertir Symfony → PSR-7
        $psrResponse = $psrHttpFactory->createResponse($response);

        $worker->respond($psrResponse);
    } catch (\Throwable $e) {
        $worker->getWorker()->error((string) $e);
    }
}
