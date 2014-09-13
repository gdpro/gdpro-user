<?php
return [
    'authentication' => [
        'orm_default' => [
            'object_manager' => 'Doctrine\ORM\EntityManager',
            'identity_class' => 'GdproUser\Entity\User',
            'identity_property' => 'email',
            'credential_property' => 'password',
            'credential_callable' => 'GdproUser\Validator\CredentialValidator::validate'
        ]
    ]
];