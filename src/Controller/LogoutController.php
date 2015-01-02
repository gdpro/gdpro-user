<?php
namespace GdproUser\Controller;

use Zend\Authentication\AuthenticationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * Class LogoutController
 * @package GdproUser\Controller
 */
class LogoutController extends AbstractActionController
{
    protected $viewModel;

    /**
     * @var \Zend\Authentication\AuthenticationService
     */
    protected $authenticationService;

    /**
     * Constructor
     * @param AuthenticationService $authenticationService
     */
    public function __construct(
        ViewModel $viewModel,
        AuthenticationService $authenticationService
    ) {
        $this->viewModel = $viewModel;
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
