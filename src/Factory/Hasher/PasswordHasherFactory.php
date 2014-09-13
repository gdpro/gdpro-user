<?php
namespace GdproUser\Factory\Hasher;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class PasswordHasherFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');
        $hasherConfig = $config['gdpro_user']['password_hashing'];

        return new \GdproUser\Hasher\PasswordHasher(
            $hasherConfig
        );
    }
}
