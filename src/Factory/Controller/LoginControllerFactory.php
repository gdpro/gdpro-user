<?php
namespace GdproUser\Factory\Controller;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $services = $controllerManager->getServiceLocator();

        return new \GdproUser\Controller\LoginController(
            $services->get('view_model'),
            $services->get('gdpro_user.service.login'),
            $services->get('gdpro_user.form.login')
        );
    }
}
