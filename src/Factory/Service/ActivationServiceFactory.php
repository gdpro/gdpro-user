<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ActivationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        return new \GdproUser\Service\ActivationService(
            $services->get('gdpro_user.logic.user')
        );
    }
}
