<?php
namespace GdproUser\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class RegistrationController extends AbstractActionController
{
    protected $viewModel;

    public function __construct(ViewModel $viewModel)
    {
        $this->viewModel = $viewModel;
    }

    public function registerAction()
    {

    }

    public function confirmAction()
    {

        return new ViewModel();
    }
}
