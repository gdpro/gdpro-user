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

        // Manager
//        'gdpro_user.manager.session' => 'GdproUser\Factory\Manager\SessionManagerFactory',

            // Zend Built in
            'gdpro_user.service.authentication' =>
        'GdproUser\Factory\Service\AuthenticationServiceFactory'

    //    // Service
    //    'gdpro_user.service.signup' => function ($services) {
    //            return new \GdproUser\Service\SignupService(
    //                $services->get('gdpro_user.service.signup_mail'),
    //                $services->get('gdpro_user.model.user_account')
    //            );
    //        },

    //    // Mail - Message
    //    'gdpro_user.mail.message.signup' => function ($services) {
    //            $config = $services->get('config');
    //
    //            return new \GdproMail\Mail\Message(
    //                $config['mail']['message']['signup'],
    //                $services->get('ViewRenderer'),
    //                $config['mail']['smtp']['signup']['username']
    //            );
    //        },
    //    // Mail - Transport - Smtp
    //    'gdpro_user.mail.transport.smtp.signup' => function ($services) {
    //            $config = $services->get('config');
    //
    //            return new \GdproMail\Mail\Transport\Smtp(
    //                $config['mail']['smtp']['signup']
    //            );
    //        },
    //
    //    'zend.authentication.authentication_service' => function ($serviceManager) {
    //            // If you are using DoctrineODMModule:
    //            return $serviceManager->get('doctrine.authenticationservice.orm_default');
    //        }
    ]
];