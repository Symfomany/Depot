<?php

namespace Alpha\BetaBundle\Repository;

use Doctrine\ORM\EntityRepository;

class TestRepository extends EntityRepository
{
    public function getAllTests()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p.id FROM BetaBundle:Test ')
            ->getResult();
    }
}
?>
