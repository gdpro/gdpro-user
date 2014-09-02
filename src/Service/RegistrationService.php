<?php
namespace GdproUser\Service;

use GdproUser\Logic\UserLogic;
use GdproUser\Entity\UserInterface;
use GdproMailer\MailerService;
use GdproMailer\MessageRenderer;
use GdproMailer\SmtpManager;

class RegistrationService
{
    protected $config;
    protected $userLogic;
    protected $mailerService;
    protected $messageRenderer;
    protected $smtpManager;

    public function __construct(
        array $config,
        UserLogic $userLogic,
        MailerService $mailerService,
        MessageRenderer $messageRenderer,
        SmtpManager $smtpManager
    ) {
        $this->config = $config;
        $this->userLogic = $userLogic;
        $this->mailerService = $mailerService;
        $this->messageRenderer = $messageRenderer;
        $this->smtpManager = $smtpManager;
    }

    public function register($user)
    {
        // Check email not already use
        $emailExist = $this->userLogic->existEmail(
            $user->getEmail()
        );

        if($emailExist) {
            throw new \Exception(
                'L\'adresse email "'.$user->getEmail().'" n\'est pas disponible.'
            );
        }

        // Save user account in DB
        $this->userLogic->saveUser($user);

        // If send activation email options is enabled
        if($this->config['send_email_activation']['enabled'] == true) {
            $message = $this->messageRenderer->render(

                $this->config['template_email'],
                [
                    'activationKey' => $user->getActivationKey()
                ]);

            $smtpName = $this->config['smtp_name'];

            $this->mailerService->sendMessage(
                $message,
                $this->smtpManager->get($smtpName),
                $user->getEmail()
            );
        }
    }
}