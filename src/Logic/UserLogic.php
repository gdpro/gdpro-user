<?php
namespace GdproUser\Logic;

use GdproTool\Generator\Uuid;
use GdproTool\Generator\ActivationKey;
use GdproUser\Entity\UserAccountInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class UserAccountLogic
{
    protected $entityManager;
    protected $repository;
    protected $entityClass;

    public function __construct(
        EntityManager $entityManager,
        EntityRepository $repository,
        $entityClass
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->entityClass = $entityClass;
    }

    public function createUserAccount()
    {
        $userAccount = new $this->entityClass();
        $userAccount->setUuid(Uuid::v5());
        $userAccount->setActivated(0);
        $userAccount->setActivationKey(ActivationKey::generate());
        $userAccount->setCreationDate(new \Datetime());
        $userAccount->setDeleted(0);
        $userAccount->setIsAdmin(0);

        return $userAccount;
    }

    public function existEmail($email)
    {
        $result = $this->repository->findOneBy(['email' => $email]);

        if($result) {
            return true;
        }

        return false;
    }

    public function saveUserAccount(UserAccountInterface $userAccount)
    {
        $userAccount->setModificationDate(new \Datetime());

        $this->entityManager->persist($userAccount);
        $this->entityManager->flush();
    }

    public function deleteUserAccount(UserAccountInterface $userAccount)
    {
        $userAccount->setDeletionDate(new \Datetime());
        $userAccount->setDeleted(1);

        $this->saveUserAccount($userAccount);
    }


    public function findUserByUsername($username)
    {
    }

    public function findUserByEmail($email)
    {

    }

    //  check if the value looks like an email to choose
    public function findUserByUsernameOrEmail($value)
    {
    }

    public function findUserByConfirmationToken($token)
    {
    }

    public function findUsers()
    {
    }

    public function updateUser($user)
    {
    }
}
