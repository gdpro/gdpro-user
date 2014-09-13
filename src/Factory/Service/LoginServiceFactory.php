<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        return new \GdproUser\Service\LoginService(
            $services->get('doctrine.authenticationadapter.orm_default'),
            $services->get('gdpro_user.service.authentication')
//            $services->get('gdpro_user.manager.session')
        );
    }
}
