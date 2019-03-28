<?php

namespace TestAtlasBundle\Entity;

use Doctrine\ORM\EntityRepository;


class UsersRepository extends EntityRepository
{

    public function checkIfIssetUser($email, $document)
    {
        $query = $this->getEntityManager()
            ->createQuery('SELECT c FROM TestAtlasBundle:Users c WHERE UPPER(c.email) LIKE :email OR UPPER(c.document) LIKE :document')
            ->setParameter('email',  strtoupper($email ))
            ->setParameter('document',  strtoupper($document ));

        try
        {
            return $query->getResult();

        }
        catch(\Exception $e)
        {
            return false;
        }

    }
}