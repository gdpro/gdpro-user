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
        LoginService $loginService,
        LoginForm $loginForm
    ) {
        $this->viewModel = new ViewModel();
        $this->loginService = $loginService;
        $this->loginForm = $loginForm;
    }

    public function loginAction()
    {
        $role = $this->params()->fromRoute('role');

        $errors = [];
        if(isset($role)) {
            $errors [] = 'Vous devez &ecirc;tre connect&eacute; avec un compte '.$role;
        }

        /** @var \Zend\Http\Request $request */
        $request = $this->getRequest();

        $this->viewModel->setVariable('loginForm', $this->loginForm);

        // If request is not a post, return view
        if(!$request->isPost()) {
            $this->viewModel->setVariable('errors', $errors);
            return $this->viewModel;
        }

        // Get Post data and set into form
        $postData = $this->params()->fromPost();
        $this->loginForm->setData($postData);

        // If login form is not valid, return view
        if(!$this->loginForm->isValid()) {
            $this->viewModel->setVariable('errors', $errors);
            return $this->viewModel;
        }

        // Hydrate User with data
        $email = $postData['email'];
        $password = $postData['password'];
        $authResult = $this->loginService->login($email, $password);

        if(!$authResult->isValid()) {
            $errors[] = $authResult->getMessages();

            $this->viewModel->setVariable('errors', $errors);
            return $this->viewModel;
        }

        return $this->redirect()->toRoute('auth/redirection');
    }
}
