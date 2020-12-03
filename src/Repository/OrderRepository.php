<?php

namespace App\Repository;

use App\Entity\Connection;
use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Query\Parameter;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

    public function untrackOrder(Connection $connection, string $trackNumber, string $orderId)
    {
        $this->createQueryBuilder('o')
            ->update()
            ->set('o.isClosed', ':closed')
            ->set('o.sticker', ':sticker')
            ->where('o.connection = :connection')
            ->andWhere('o.trackNumber = :trackNumber')
            ->andWhere('o.orderId = :orderId')
            ->setParameters(new ArrayCollection([
                new Parameter('connection', $connection),
                new Parameter('trackNumber', $trackNumber),
                new Parameter('orderId', $orderId),
                new Parameter('closed', true, Types::BOOLEAN),
                new Parameter('sticker', null)
            ]))
            ->getQuery()
            ->execute();
    }
}
