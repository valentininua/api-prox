<?php

namespace App\Repository;

use App\Entity\NewBaseByNumberCarEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class NewBaseByNumberCarRepository extends ServiceEntityRepository
{
    public function __construct(
        private ManagerRegistry $doctrine
    )
    {
    }

    public function saveCarInfo(array $arr = [], array $info = [])
    {
        $entityManager = $this->doctrine->getManager();
        $product = new NewBaseByNumberCarEntity();
        $product->setNumberCar($info['numberCar']);
        $product->setIp($info['ip']);
        $product->setRespons($arr);
        $entityManager->persist($product);
        $entityManager->flush();
    }
}
