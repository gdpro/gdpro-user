<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');

        return new \GdproUser\Service\RegistrationService(
            $config['gdpro_user']['registration'],
            $services->get('gdpro_user.logic.user'),
            $services->get('gdpro_mailer.mailer_service'),
            $services->get('gdpro_mailer.message_renderer'),
            $services->get('gdpro_mailer.smtp_manager')
        );
    }
}
