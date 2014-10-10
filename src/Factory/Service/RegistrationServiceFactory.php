<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');
        $jobPluginManager = $services->get('SlmQueue\Job\JobPluginManager');
        $queuePluginManager = $services->get('SlmQueue\Queue\QueuePluginManager');


        return new \GdproUser\Service\RegistrationService(
            $config['gdpro_user']['registration'],
            $services->get('gdpro_user.logic.user'),
            $jobPluginManager->get('gdpro_mailer.job.send_mail'),
            $queuePluginManager->get('socialcar')
        );
    }
}
