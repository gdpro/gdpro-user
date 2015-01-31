<?php
namespace GdproUser\Logic;

use GdproTool\Generator\Uuid;
use GdproTool\Generator\ActivationKey;
use GdproUser\Entity\UserInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class UserLogic
{
    protected $entityManager;
    protected $repository;
    protected $user;

    public function __construct(
        EntityManager $entityManager,
        EntityRepository $repository,
        $user
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->user = $user;
    }

    public function createUser()
    {
        $user = clone $this->user;

        $user->setUuid(Uuid::v1());
        $user->setActivated(0);
        $user->setActivationKey(ActivationKey::generate());
        $user->setCreationDate(new \Datetime());
        $user->setDeleted(0);

        return $user;
    }

    public function existEmail($email)
    {
        $result = $this->repository->findOneBy([
            'email' => $email,
            'deleted' => 0
        ]);

        if($result) {
            return true;
        }

        return false;
    }

    /**
     * @param $user
     */
    public function save($user)
    {
        $user->setModificationDate(new \Datetime());

        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /** @deprecated */
    public function saveUser($user)
    {
        return $this->save($user);
    }

    public function deleteUser($user)
    {
        $user->setDeletionDate(new \Datetime());
        $user->setDeleted(1);

        $this->saveUser($user);
    }

    /**
     * Find One user by activationKey
     *
     * @param string $activationKey
     * @return UserInterface
     */
    public function findOneUserByActivationKey($activationKey)
    {
        $user = $this->repository->findOneBy([
            'activationKey' => $activationKey,
            'deleted' => 0
        ]);

        return $user;
    }

    public function activateUser($user)
    {
        $user->setActivated(true);
        $user->setActivationDate(new \DateTime());
        $user->setActivationKey(null);
    }
}
