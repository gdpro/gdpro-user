<?php

namespace GdproUser\Service;

use GdproUser\Entity\UserInterface;
use GdproUser\Logic\UserLogic;

class ActivationService
{
    protected $userLogic;

    public function __construct(
        UserLogic $userLogic
    ) {
        $this->userLogic = $userLogic;
    }

    public function activate($activationKey)
    {
        // Get User By Actication Key
        $user = $this->userLogic->findOneUserByActivationKey($activationKey);

        // If user don't exist return error
        if(!$user) {
            throw new \Exception(
                'La clee d\'activation fourni n\'est pas valide ', 400
            );
        }

        // Check if user is already activated
        if($user->getActivated()) {
            throw new \Exception(
                'Le compte utilisateur a deja ete active', 400
            );
        }

        // Activate User
        $this->userLogic->activateUser($user);
        $this->userLogic->saveUser($user);

        return $user;
    }
}
