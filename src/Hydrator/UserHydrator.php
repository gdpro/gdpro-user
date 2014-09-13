<?php
namespace GdproUser\Hydrator;

use GdproUser\Hasher\PasswordHasher;
use GdproUser\Logic\UserLogic;
use Zend\Stdlib\Hydrator\ClassMethods;


class UserHydrator extends ClassMethods
{
    protected $userLogic;
    protected $passwordHasher;

    public function __construct(
        UserLogic $userLogic,
        PasswordHasher $passwordHasher
    ) {
        $this->userLogic = $userLogic;
        $this->passwordHasher = $passwordHasher;

        parent::__construct(false);
    }

    public function hydrate(array $data, $object = null)
    {
        if(!isset($object)) {
            $object = $this->userLogic->createUser();
        }

        if(isset($data['password'])) {
            $passwordHash = $this->passwordHasher->hash($data['password']);
            $object->setPassword($passwordHash);
            unset($data['password']);
        }

        return parent::hydrate($data, $object);
    }

    public function extact($object)
    {
        $data = parent::extract($object);
        unset($data['password']);
        unset($data['deleted']);
        unset($data['activationKey']);
        unset($data['activated']);

        return $data;
    }
}