<?php
return [
    'aliases' => [
        'Zend\Authentication\AuthenticationService' => 'gdpro_user.service.authentication'
    ],
    'invokables' => [
        'gdpro_user.form.login' => 'GdproUser\Form\LoginForm',
    ],
    'factories' =>  [
        // Service
        'gdpro_user.service.registration' => 'GdproUser\Factory\Service\RegistrationServiceFactory',
        'gdpro_user.service.activation' => 'GdproUser\Factory\Service\ActivationServiceFactory',
        'gdpro_user.service.login' => 'GdproUser\Factory\Service\LoginServiceFactory',

        // Logic
        'gdpro_user.logic.user' => 'GdproUser\Factory\Logic\UserLogicFactory',

        // Hasher
        'gdpro_user.hasher.password' => 'GdproUser\Factory\Hasher\PasswordHasherFactory',

        // Zend Built in library
        'gdpro_user.service.authentication' => 'GdproUser\Factory\Service\AuthenticationServiceFactory'
    ]
];