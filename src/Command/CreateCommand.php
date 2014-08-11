<?php
namespace GdproUserAccount\Command;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Console\Request as ConsoleRequest;
use Zend\Math\Rand;

class CreateCommand extends AbstractActionController
{
    public function resetpasswordAction()
    {
        $request = $this->getRequest();

        // Make sure that we are running in a console and the user has not tricked our
        // application into running this action from a public web server.
        if (!$request instanceof ConsoleRequest){
            throw new \RuntimeException('You can only use this action from a console!');
        }

        // Get user email from console and check if the user used --verbose or -v flag
        $userEmail   = $request->getParam('userEmail');
        $verbose     = $request->getParam('verbose') || $request->getParam('v');

        // reset new password
        $newPassword = Rand::getString(16);

        //  Fetch the user and change his password, then email him ...
        // [...]

        if (!$verbose) {
            return "Done! $userEmail has received an email with his new password.\n";
        }else{
            return "Done! New password for user $userEmail is '$newPassword'. It has also been emailed to him. \n";
        }
    }
}