<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\SampleService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class SampleController
{
    public function __construct(private readonly SampleService $sampleService)
    {
    }

    public function index(Request $request, Response $response, $args): Response
    {
        return Twig::fromRequest($request)->render(
            $response,
            'samples/index.twig',
            ['samples' => $this->sampleService->getSamples()]
        );
    }
}
