<?php
return [
    'invokables' => [
        'GdproUser\Controller\Registration' => 'GdproUser\Controller\RegistrationController',
    ],
    'factories' => [
        'GdproUser\Controller\Activation' => 'GdproUser\Factory\Controller\ActivationControllerFactory',
        'GdproUser\Controller\Login' => 'GdproUser\Factory\Controller\LoginControllerFactory',
        'GdproUser\Controller\Logout' => 'GdproUser\Factory\Controller\LogoutControllerFactory',
    ]
];