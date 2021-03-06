<?php
namespace GdproUser\Controller;

use Core\Extractor\UserExtractor;
use GdproUser\Hydrator\UserHydrator;
use GdproUser\Logic\UserLogic;
use Zend\Authentication\AuthenticationService;
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
        AuthenticationService $authenticationService,
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

    public function indexAction()
    {
        $user = $this->authenticationService->getIdentity();

        return $this->viewModel;
    }

    /**
     * @return mixed
     * @deprecated
     */
    public function listAction()
    {
        return $this->indexAction();

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
//        if(!isset($id)) {
//            $id =
//        }
//
//        $routeParams['id'] = $user->getId();
        return $this->redirect()->toRoute('user', ['action' => 'list']);
    }
}
