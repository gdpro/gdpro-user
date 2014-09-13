<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AuthenticationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');

        $adapter = $services->get('doctrine.authenticationadapter.orm_default');
        $authentication = $services->get('doctrine.authenticationservice.orm_default');
        $authentication->setAdapter($adapter);

        return $authentication;
    }
}
