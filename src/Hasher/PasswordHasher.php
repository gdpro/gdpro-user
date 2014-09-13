<?php
namespace GdproUser\Hasher;

class PasswordHasher
{
    protected $cost = 10;

    protected $salt = 'This is my default salt key';

    public function __construct(array $options)
    {
        if(array_key_exists('salt', $options)) {
            $this->salt = $options['salt'];
        }

        if(array_key_exists('cost', $options)) {
            $this->cost = $options['cost'];
        }
    }

    public function hash($password)
    {
        $passwordOptions = [
            'salt' => $this->salt,
            'cost' => $this->cost
        ];

        $hash = password_hash($password, PASSWORD_BCRYPT, $passwordOptions);

        return $hash;
    }
}