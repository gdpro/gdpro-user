<?php
namespace GdproUserAccount\Factory\Logic;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserAccountLogicFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $entityManager = $services->get('Doctrine\ORM\EntityManager');

        $config = $services->get('config');
        $entityClass = $config['gdpro_user_account']['entity_class'];

        return new \GdproUserAccount\Logic\UserAccountLogic(
            $entityManager,
            $entityManager->getRepository($entityClass),
            $entityClass
        );
    }
}
