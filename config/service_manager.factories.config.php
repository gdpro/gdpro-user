<?php
return [
    // Service
    'gdpro_user.service.registration' => 'GdproUser\Factory\Service\RegistrationServiceFactory',
    'gdpro_user.service.activation' => 'GdproUser\Factory\Service\ActivationServiceFactory',



    // Logic
    'gdpro_user.logic.user' => 'GdproUser\Factory\Logic\UserLogicFactory',


//
//    // Service
//    'gdpro_user.service.signup' => function ($services) {
//            return new \GdproUser\Service\SignupService(
//                $services->get('gdpro_user.service.signup_mail'),
//                $services->get('gdpro_user.model.user_account')
//            );
//        },
//    'gdpro_user.service.signup_mail' => function ($services) {
//            return new \GdproMail\Service\MailService(
//                $services->get('gdpro_user.mail.transport.smtp.signup'),
//                $services->get('gdpro_user.mail.message.signup')
//            );
//        },
//    'gdpro_user.service.login' => function ($services) {
//            return new \GdproUser\Service\LoginService(
//                $services->get('doctrine.authenticationadapter.odm_default'),
//                $services->get('zend.authentication.authentication_service')
//            );
//        },
//
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
];