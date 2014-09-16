<?php
namespace GdproUser\Controller;

use GdproUser\Service\LoginService;
use GdproUser\Form\LoginForm;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{
    protected $loginService;
    protected $loginForm;

    public function __construct(
        LoginService $loginService,
        LoginForm $loginForm
    ) {
        $this->loginService = $loginService;
        $this->loginForm = $loginForm;
    }

    public function loginAction()
    {
        /** @var \Zend\Http\Request $request */
        $request = $this->getRequest();

        $variables = [
            'loginForm' => $this->loginForm
        ];

        // If request is not a post, return view
        if(!$request->isPost()) {
            return new ViewModel($variables);
        }

        // Get Post data and set into form
        $postData = $this->params()->fromPost();
        $this->loginForm->setData($postData);

        // If login form is not valid, return view
        if(!$this->loginForm->isValid()) {
            return new ViewModel($variables);
        }

        // Hydrate User with data
        $email = $postData['email'];
        $password = $postData['password'];
        $authResult = $this->loginService->login($email, $password);

        if(!$authResult->isValid()) {
            $variables['errors'] = $authResult->getMessages();
            return new ViewModel($variables);
        }

        return $this->redirect()->toRoute('auth/redirection');
    }
}
