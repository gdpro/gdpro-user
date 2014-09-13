<?php
namespace GdproUser\Validator;

use Zend\Crypt\Password\Bcrypt;

class CredentialValidator
{
    static public function validate($user, $passwordGiven)
    {
        $passwordHash = $user->getPassword();

        $passwordBcrypt = new Bcrypt();
        $result = $passwordBcrypt->verify($passwordGiven, $passwordHash);

        return $result;
    }
}
