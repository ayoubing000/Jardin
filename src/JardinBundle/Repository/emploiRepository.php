<?php

namespace JardinBundle\Repository;


use Doctrine\ORM\EntityRepository;

class emploiRepository extends EntityRepository
{
    public function findid($id) {
        $qb=$this->createQueryBuilder('s');
        $qb->where('s.id=:id')->setParameter('id',$id);
        return $qb->getQuery()->getResult();

    }
}
