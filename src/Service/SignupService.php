<?php
namespace GdproUserAccount\Service;

class SignupService
{
    /**
     * @var \GdproMail\Service\MailService
     */
    protected $mailService;

    /**
     * @var \GdproUserAccount\Model\UserAccountModel
     */
    protected $userAccountModel;

    /**
     * Constructor
     *
     * @param $userAccountModel
     * @param $mailService
     */
    public function __construct($mailService, $userAccountModel)
    {
        $this->mailService = $mailService;
        $this->userAccountModel = $userAccountModel;
    }

    public function signup($data)
    {
        $userAccount = $this->userAccountModel->createFromArray($data);

        $this->mailService->setVars([
            'activationKey' => $userAccount->getActivationKey()
        ]);
        $this->mailService->setRecipients([
            $userAccount->getEmail()
        ]);

        $this->mailService->sendMessage();

        return $userAccount;
    }
}