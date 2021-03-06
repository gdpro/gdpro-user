<?php
namespace GdproUser\Factory\Mailer\Message;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RegistrationMessageFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');

        return new \GdproMailer\Message(
            $config['gdpro_user_mailer']['messages']['registration'],
            $services->get('viewRenderer')
        );
    }
}
