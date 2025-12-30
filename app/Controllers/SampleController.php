<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Entity\Sample;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;

class SampleController
{
    public function index(Request $request, Response $response, $args): Response
    {
        $params = [
            'host'     => $_ENV['DB_HOST'],
            'user'     => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
            'dbname'   => $_ENV['DB_DATABASE'],
            'driver'   => $_ENV['DB_DRIVER'] ?? 'pdo_mysql',
        ];

        // test creating a Sample entity
        $entityManager = new EntityManager(
            DriverManager::getConnection($params),
            ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/app/Entity'])
        );

        $sample = (new Sample())
            ->setTitle('Sample')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

        $entityManager->persist($sample);
        $entityManager->flush();

        return Twig::fromRequest($request)->render($response, 'index.twig');
    }
}
