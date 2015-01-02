<?php
namespace GdproUser\Controller;

use GdproUser\Service\ActivationService;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ActivationController extends AbstractActionController
{
    protected $viewModel;
    protected $activationService;

    public function __construct(
        ViewModel $viewModel,
        ActivationService $activationService
    ) {
        $this->viewModel = $viewModel;
        $this->activationService = $activationService;
    }

    public function activateAction()
    {
        $activationKey = $this->params()->fromRoute('activation_key');

        $this->activationService->activate($activationKey);

        return $this->viewModel;
    }
}
