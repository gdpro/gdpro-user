<?php
namespace GdproUser\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class UserActivationControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $services = $controllerManager->getServiceLocator();

        return new \GdproUser\Controller\UserActivationController(
            $services->get('gdpro_user.service.activation')
        );
    }
}
