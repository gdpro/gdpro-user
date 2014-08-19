<?php
namespace GdproUser\Factory\Logic;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserAccountLogicFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $entityManager = $services->get('Doctrine\ORM\EntityManager');

        $config = $services->get('config');
        $entityClass = $config['gdpro_user']['entity_class'];

        return new \GdproUser\Logic\UserAccountLogic(
            $entityManager,
            $entityManager->getRepository($entityClass),
            $entityClass
        );
    }
}
