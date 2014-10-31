<?php
namespace GdproUser\Controller;

use GdproUser\Logic\UserLogic;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractActionController
{
    protected $viewModel;

    protected $authenticationService;

    protected $userLogic;

    protected $userHydrator;

    protected $userExtractor;

    public function __construct(
        ViewModel $viewModel,
        AuthenticationService $authenticationService;
        UserLogic $userLogic,
        UserHydrator $userHydrator,
        UserExtractor $userExtractor
    ) {
        $this->viewModel = $viewModel;
        $this->authenticationService = $authenticationService;
        $this->userLogic = $userLogic;
        $this->userHydrator = $userHydrator;
        $this->userExtractor = $userExtractor;
    }

    public function listAction()
    {
        $user = $this->authenticationService->getIdentity();

        return $this->viewModel;
    }

    public function modifyAction()
    {
        $routeParams['action'] = 'list';

        if(!$this->request()->isPost())
        {
            return $this->redirect()->toRoute('user', ['action' => 'list']);
        }

        $userData = $this->params()->fromPost();
        $id = $this->params()->fromGet('id');
        if(!isset($id)) {
            $id =
        }

        $routeParams['id'] = $user->getId();
        return $this->redirect()->toRoute('user', ['action' => 'list']);
    }
}
