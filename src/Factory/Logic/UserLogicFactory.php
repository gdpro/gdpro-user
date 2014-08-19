<?php
namespace GdproUser\Factory\Logic;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserLogicFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $entityManager = $services->get('Doctrine\ORM\EntityManager');

        $config = $services->get('config');
        $userEntityName = $config['gdpro_user']['entity_name'];

        return new \GdproUser\Logic\UserLogic(
            $entityManager,
            $entityManager->getRepository($userEntityName),
            new $userEntityName()
        );
    }
}
