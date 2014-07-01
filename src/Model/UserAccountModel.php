<?php
namespace GdproUserAccount\Model;

use GdproTool\Generator\Uuid;
use GdproTool\Generator\ActivationKey;
use GdproUserAccount\Entity\UserAccount;

class UserAccountModel extends AbstractModel
{
    /**
     * Create a user account
     * - Verify that the user email don't already exist in DB
     * - Send a email to user to activate account
     */
    public function create(UserAccount $userAccount)
    {
        $result = $this->getRepository()->findOneBy([
            'email' => $userAccount->getEmail(),
            'deleted' => 0
        ]);

        if($result) {
            throw new \Exception('Impossible to create an user with this address email.');
        }

        $userAccount->setUuid(Uuid::v5());
        $userAccount->setActivationKey(ActivationKey::generate());
        $userAccount->setCreationDate(new \DateTime('NOW'));
        $userAccount->setActivated(0);
        $userAccount->setDeleted(0);

        $this->save($userAccount);
    }

    public function createFromArray($data)
    {
        $userAccount = $this->getNewEntity();

        foreach($data as $key => $datum) {
            $method = 'set'.ucfirst($key);
            if(method_exists($userAccount, $method)) {
                $userAccount->$method($datum);
            }
        }

        $this->create($userAccount);

        return $userAccount ;
    }
}