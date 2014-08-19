<?php
namespace GdproUser\Process;

class LoginProcess
{
    protected $authAdapter;

    protected $authService;

    public function __construct($authAdapter, $authService)
    {
        $this->authAdapter = $authAdapter;
        $this->authService = $authService;
    }

    public function login($username, $password)
    {
        $this->authAdapter->setIdentitValue($username);
        $this->authAdapter->setCredentialValue($password);

        $result = $this->authService->authenticate($this->authAdapter);
    }
}
