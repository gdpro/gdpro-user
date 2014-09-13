<?php
namespace GdproUser\Controller;

use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;

/**
 * Class LogoutController
 * @package GdproUser\Controller
 */
class LogoutController extends AbstractActionController
{
    /**
     * @var \Zend\Authentication\AuthenticationService
     */
    protected $authenticationService;

    /**
     * Constructor
     * @param AuthenticationService $authenticationService
     */
    public function __construct(
        AuthenticationService $authenticationService
    ) {
        $this->authenticationService = $authenticationService;
    }

    /**
     * Login Action
     * @return \Zend\Http\Response
     */
    public function logoutAction()
    {
        $this->authenticationService->clearIdentity();

        return $this->redirect()->toRoute('home');
    }
}