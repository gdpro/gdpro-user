<?php
namespace GdproUser\Service;

use DoctrineModule\Authentication\Adapter\ObjectRepository;
use Zend\Authentication\AuthenticationService;
use Zend\Session\SessionManager;

class LoginService
{
    protected $authenticationAdapter;
    protected $authenticationService;
//    protected $sessionManager;

    public function __construct(
        ObjectRepository $authenticationAdapter,
        AuthenticationService $authenticationService
//        SessionManager $sessionManager
    ) {
        $this->authenticationAdapter = $authenticationAdapter;
        $this->authenticationService = $authenticationService;
//        $this->sessionManager = $sessionManager;
    }

    public function login($email, $password, $rememberMe = false)
    {
        $this->authenticationAdapter->setIdentity($email);
        $this->authenticationAdapter->setCredential($password);

        $result  = $this->authenticationService->authenticate($this->authenticationAdapter);

        if(!$result->isValid()) {
            return $result;
        }

        if(!$this->authenticationService->hasIdentity()) {
            return $result;
        }
//
//        $t = $this->sessionManager;
//        $sessionExsit = $this->sessionManager->sessionExists();
//        $this->sessionManager->setStorage($this->authenticationService->getStorage());
//
//        $b = $this->sessionManager->getStorage();
//


        return $result;
    }
}
