<?php
namespace GdproUserAccount\Factory\Process;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationProcessFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');

        return new \GdproUserAccount\Process\RegistrationProcess(
            $config['gdpro_user_account']['service']['registration'],
            $services->get('gdpro_user_account.logic.user_account'),
            $services->get('gdpro_mailer.message.registration')
        );
    }
}
