<?php
namespace GdproUser\Repository;

use Doctrine\ORM\Query\Expr;
use GdproUser\Entity\User;

class UserRepository extends EntityRepository
{
    /**
     * Find One user by activationKey
     *
     * @param $activationKey
     * @return mixed
     */
    public function findOneByActivationKey($activationKey)
    {
        $criteria = [
            'activationKey' => $activationKey,
            'deleted' => 0
        ];

        $user = $this->findOneBy($criteria);

        return $user;
    }
}
