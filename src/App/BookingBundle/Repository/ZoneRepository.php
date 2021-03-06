<?php

namespace App\BookingBundle\Repository;

/**
 * ZoneRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ZoneRepository extends \Doctrine\ORM\EntityRepository
{
    public function getZoneByService($id, $obj=false) {
        $qb = $this->createQueryBuilder('z')
            ->addSelect('z')
            ->leftJoin('z.services', 's')
            ->andWhere('s.id = :id')
            ->setParameter('id', $id);
        return $qb->getQuery()->getResult();
       // return $qb->getQuery()->getArrayResult();
    }
}
