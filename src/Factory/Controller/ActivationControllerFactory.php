<?php
namespace GdproUser\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ActivationControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $services = $controllerManager->getServiceLocator();

        return new \GdproUser\Controller\ActivationController(
            $services->get('view_model'),
            $services->get('gdpro_user.service.activation')
        );
    }
}
