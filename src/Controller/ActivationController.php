<?php
namespace GdproUserAccount\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ActivationController extends AbstractActionController
{
    public function activateAction()
    {
        $this->params()->fromQuery();

        return new ViewModel();
    }
}
