<?php
namespace GdproUserAccount\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator as ORMPaginator;
use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator;

abstract class AbstractRepository extends EntityRepository
{

    /**
     * Get Entity Paginator
     *
     * @return \DoctrineORMModule\Paginator\Adapter\DoctrinePaginator
     */
    public function getPaginator()
    {
        $query = $this->_em->createQueryBuilder()
            ->select('e')
            ->from($this->getEntityName(), 'e')
            ->getQuery();

        $ormPaginator = new ORMPaginator($query);
        $doctrinePaginator = new DoctrinePaginator($ormPaginator);

        return $doctrinePaginator;
    }

    public function getPaginatorBy(array $criteria)
    {
        $key = $criteria[0];
        $value = $criteria[1];

        $query = $this->_em->createQueryBuilder()
            ->select('e')
            ->from($this->getEntityName(), 'e')
            ->where('e.' . $key . ' = :' . $key)
            ->setParameter($key, $value)
            ->getQuery();

        $ormPaginator = new ORMPaginator($query);
        $doctrinePaginator = new DoctrinePaginator($ormPaginator);

        return $doctrinePaginator;
    }
}

