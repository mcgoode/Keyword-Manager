<?php

namespace AppBundle\Repository;

/**
 * CampaignRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CampaignRepository extends \Doctrine\ORM\EntityRepository
{
    public function findByActiveAndNotPastEndDate()
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('c')
            ->andWhere('c.active = :isActive')
            ->andWhere('c.endDate >= :date')
            ->setParameter('isActive',true)
            ->setParameter('date',$today)
            ->getQuery()
            ->getResult()
            ;
    }

    public function findByActiveAndPastEndDate()
    {
        $today = new \DateTime('now');

        return $this->createQueryBuilder('c')
            ->andWhere('c.active = :isActive')
            ->andWhere('c.endDate <= :date')
            ->setParameter('isActive',true)
            ->setParameter('date',$today)
            ->getQuery()
            ->getResult()
            ;
    }

}
