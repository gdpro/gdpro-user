<?php
namespace GdproUser\Controller;

use GdproUser\Service\LoginService;
use GdproUser\Form\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    protected $viewModel;
    protected $loginService;
    protected $loginForm;

    public function __construct(
        ViewModel $viewModel,
        LoginService $loginService,
        LoginForm $loginForm
    ) {
        $this->viewModel = $viewModel;
        $this->loginService = $loginService;
        $this->loginForm = $loginForm;
    }

    public function loginAction()
    {
        $role = $this->params()->fromRoute('role');

        $errors = [];
        if(isset($role)) {
            $errors[] = 'Vous devez &ecirc;tre connect&eacute; avec un compte '.$role;
            $this->viewModel->setVariable('errors', $errors);
        }

        $this->viewModel->setVariable('loginForm', $this->loginForm);

        if(!$this->getRequest()->isPost()) {
            return $this->viewModel;
        }

        $data = $this->params()->fromPost();
        $this->loginForm->setData($data);

        if(!$this->loginForm->isValid()) {
            return $this->viewModel;
        }

        // Hydrate User with data
        $email = $data['email'];
        $password = $data['password'];
        $authResult = $this->loginService->login($email, $password);

        if($authResult->isValid()) {
            return $this->redirect()->toRoute('auth/redirection');
        }

        $errors[] = $authResult->getMessages();

        $this->viewModel->setVariable('errors', $errors);
        return $this->viewModel;
    }
}
