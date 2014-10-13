<?php
namespace GdproUser\Service;

use GdproMailer\Job\SendMailJob;
use GdproUser\Logic\UserLogic;
use SlmQueue\Queue\QueueInterface;

class RegistrationService
{
    protected $config;
    protected $userLogic;
    protected $sendMailJob;
    protected $queue;

    public function __construct(
        array $config,
        UserLogic $userLogic,
        SendMailJob $sendMailJob,
        QueueInterface $queue
    ) {
        $this->config = $config;
        $this->userLogic = $userLogic;
        $this->sendMailJob = $sendMailJob;
        $this->queue = $queue;
    }

    /**
     * @param $user
     * @throws \Exception
     * @deprecated
     */
    public function register($user)
    {
        return $this->registerUser($user);
    }

    /**
     * @param $user
     * @throws \Exception
     */
    public function registerUser($user)
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

            $content = [
                'templateEmail' => $this->config['template_email'],
                'vars' => [
                    'activationKey' => $user->getActivationKey()
                ],
                'smtpName' => $this->config['smtp_name'],
                'recipient' => $user->getEmail()
            ];

            $this->sendMailJob->setContent($content);

            $this->queue->push($this->sendMailJob);
        }
    }
}
