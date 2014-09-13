<?php
namespace GdproUser\Factory\Hydrator;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserHydratorFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $hydratorPluginManager)
    {
        $services = $hydratorPluginManager->getServiceLocator();

        return new \GdproUser\Hydrator\UserHydrator(
            $services->get('gdpro_user.logic.user'),
            $services->get('gdpro_user.hasher.password')
        );
    }
}
