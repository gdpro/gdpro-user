<?php
namespace GdproUser\Service;

use DoctrineModule\Authentication\Adapter\ObjectRepository;
use Zend\Authentication\AuthenticationService;
use Zend\Session\SessionManager;

class LoginService
{
    protected $authenticationAdapter;
    protected $authenticationService;

    public function __construct(
        ObjectRepository $authenticationAdapter,
        AuthenticationService $authenticationService
    ) {
        $this->authenticationAdapter = $authenticationAdapter;
        $this->authenticationService = $authenticationService;
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

        return $result;
    }
}
