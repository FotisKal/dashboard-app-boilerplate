<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Sample;
use Doctrine\ORM\EntityManager;

class SampleService
{
    public function __construct(private readonly EntityManager $entityManager)
    {
    }

    public function getSamples()
    {
        return $this->entityManager->createQueryBuilder()
            ->select('s')
            ->from(Sample::class, 's')
            ->getQuery()
            ->getArrayResult();
    }

    public function createSample()
    {
        $sample = (new Sample())
            ->setTitle('Sample')
            ->setCreatedAt(new \DateTime())
            ->setUpdatedAt(new \DateTime());

        $this->entityManager->persist($sample);
        $this->entityManager->flush();
    }
}
