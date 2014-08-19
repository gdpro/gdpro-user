<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');

        return new \GdproUser\Process\RegistrationProcess(
            $config['gdpro_user']['service']['registration'],
            $services->get('gdpro_user.logic.user'),
            $services->get('gdpro_mailer.message.registration')
        );
    }
}
