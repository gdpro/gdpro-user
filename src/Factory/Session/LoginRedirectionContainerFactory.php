<?php
namespace GdpoUser\Factory\Session;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoginRedirectionContainerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        return new \Core\Session\Container(
            new \Zend\Session\Container(),
            'container-gdpro_user-login-redirection'
        );
    }
}
