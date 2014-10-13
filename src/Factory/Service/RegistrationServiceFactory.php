<?php
namespace GdproUser\Factory\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');
        $configRegistration = $config['gdpro_user']['registration'];

        $jobPluginManager = $services->get('SlmQueue\Job\JobPluginManager');
        $queuePluginManager = $services->get('SlmQueue\Queue\QueuePluginManager');

        $queueName = $configRegistration['queue_name'];
        $queue = $queuePluginManager->get($queueName);

        return new \GdproUser\Service\RegistrationService(
            $configRegistration,
            $services->get('gdpro_user.logic.user'),
            $jobPluginManager->get('gdpro_mailer.job.send_mail'),
            $queue
        );
    }
}
