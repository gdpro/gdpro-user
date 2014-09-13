<?php
namespace GdproUser\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LogoutControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $services = $controllerManager->getServiceLocator();

        return new \GdproUser\Controller\LogoutController(
            $services->get('gdpro_user.service.authentication')
        );
    }
}
