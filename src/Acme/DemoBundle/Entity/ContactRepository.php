<?php

namespace Acme\DemoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * ContactRepository
 */
class ContactRepository extends EntityRepository
{
    public function getContactGroupsByContact($missionary)
    {
        $qb = $this->createQueryBuilder('cg');

        return $qb->where('cg.missionary = :missionary')
            ->setParameter('missionary', $missionary);
    }
}