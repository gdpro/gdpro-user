<?php
namespace GdproUser\Factory\Manager;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Session\SessionManager;
use Zend\Session\Container;

class SessionManagerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $services)
    {
        $config = $services->get('config');
        $gdproUserConfig= $config['gdpro_user'];

        if (!isset($gdproUserConfig['session'])) {
            return new SessionManager();
        }

        $session = $gdproUserConfig['session'];

        $sessionConfig = null;
        if (isset($session['config'])) {
            $class = isset($session['config']['class'])  ? $session['config']['class'] : 'Zend\Session\Config\SessionConfig';
            $options = isset($session['config']['options']) ? $session['config']['options'] : array();
            $sessionConfig = new $class();
            $sessionConfig->setOptions($options);
        }

        $sessionStorage = null;
        if (isset($session['storage'])) {
            $class = $session['storage'];
            $sessionStorage = new $class();
        }

        $sessionSaveHandler = null;
        if (isset($session['save_handler'])) {
            // class should be fetched from service manager since it will require constructor arguments
            $sessionSaveHandler = $services->get($session['save_handler']);
        }

        $sessionManager = new SessionManager($sessionConfig, $sessionStorage, $sessionSaveHandler);

        if (isset($session['validator'])) {
            $chain = $sessionManager->getValidatorChain();

            foreach ($session['validator'] as $validator) {
                $validator = new $validator();
                $chain->attach('session.validate', array($validator, 'isValid'));
            }
        }

        Container::setDefaultManager($sessionManager);

        return $sessionManager;
    }
}
