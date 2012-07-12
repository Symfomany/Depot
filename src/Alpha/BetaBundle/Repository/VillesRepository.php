<?php

namespace Alpha\BetaBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;

class VillesRepository extends EntityRepository
{
    public function getAllTests()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT p.id FROM BetaBundle:Villes p')
            ->getResult();
    }
    public function getSoundEx()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT v.nomVille FROM BetaBundle:Villes v WHERE v.nomVille LIKE ?')
            ->setParameter(1, 'Pa%')
            ->getResult();
    }
//    public function getSoundEx($ch = null)
//    {
////        return $this->getEntityManager()
////            ->createQuery('SELECT p.id FROM BetaBundle:Villes ')
////            ->getResult();
//        // get Doctrine_Connection object
//        
//        $rsm = new ResultSetMapping;
//        $rsm->addEntityResult('BetaBundle:Villes', 'u');
////        $rsm->addFieldResult('u', 'id', 'id');
//        $rsm->addFieldResult('u', 'nom_ville', 'nomVille');
//////
//        $sql = "SELECT nom_ville
//                FROM villes
//                WHERE 
//                LIMIT 0, 100";
//        $query = $this->getEntityManager()->createNativeQuery($sql, $rsm);
//        $query->setParameter(1, $ch);
//        return $query->getArrayResult();
//    }
}
?>
