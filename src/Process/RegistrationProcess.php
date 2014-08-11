<?php
namespace GdproUserAccount\Process;

use GdproUserAccount\Logic\UserAccountLogic;
use GdproMail\Message;
use GdproUserAccount\Entity\UserAccountInterface;

class RegistrationProcess
{
    protected $config;
    protected $userAccountLogic;
    protected $message;
    protected $smtp;

    public function __construct(
        array $config,
        UserAccountLogic $userAccountLogic,
        Message $message,
        Smtp $smtp
    ) {
        $this->config = $config;
        $this->userAccountLogic = $userAccountLogic;
        $this->message = $message;
        $this->smpt = $smtp;
    }

    public function register(UserAccountInterface $userAccount)
    {
        // Check email not already use
        $emailExist = $this->userAccountLogic->existEmail($userAccount->getEmail());

        if($emailExist) {
            throw new \Exception('Email already in use');
        }

        // Save user account in DB
//        $this->userAccountLogic->saveUserAccount($userAccount);

        // If send activation email options is enabled
        if($this->config['send_email_activation']['enabled'] == true) {
            $this->message->setVars([
                'activationKey' => $userAccount->getActivationKey()
            ]);
            $this->smtp->send(
                $this->message, $smtp, $userAccount->getEmail()
            );


        }

        return $userAccount;


    }
}
