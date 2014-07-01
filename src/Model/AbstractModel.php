<?php
namespace GdproUserAccount\Model;

use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;


class AbstractModel
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    protected $entityManager;

    /**
     * @var string
     */
    protected $entityClass;

    public function __construct($entityManager, $entityClass)
    {
        $this->entityManager = $entityManager;
        $this->entityClass = $entityClass;
    }

    protected function getRepository()
    {
        return $this->entityManager->getRepository($this->entityClass);
    }

    public function getNewEntity()
    {
        $entityClass = '\\'.$this->entityClass;
        return new $entityClass();
    }

    public function save($user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    protected function setCreationDate($entity)
    {
        $dateTime = new \DateTime('NOW');
        $entity->setCreationDate($dateTime);
    }

    protected function setModificationDate($entity)
    {
        $dateTime = new \DateTime('NOW');
        $entity->setModificationDate($dateTime);
    }


}


