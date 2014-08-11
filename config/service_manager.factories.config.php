<?php
return [
    // Process
    'gdpro_user_account.process.registration' => 'GdproUserAccount\Factory\Process\RegistrationProcessFactory',

    // Logic
    'gdpro_user_account.logic.user_account' => 'GdproUserAccount\Factory\Logic\UserAccountLogicFactory',


//
//    // Service
//    'gdpro_user_account.service.signup' => function ($services) {
//            return new \GdproUserAccount\Service\SignupService(
//                $services->get('gdpro_user_account.service.signup_mail'),
//                $services->get('gdpro_user_account.model.user_account')
//            );
//        },
//    'gdpro_user_account.service.signup_mail' => function ($services) {
//            return new \GdproMail\Service\MailService(
//                $services->get('gdpro_user_account.mail.transport.smtp.signup'),
//                $services->get('gdpro_user_account.mail.message.signup')
//            );
//        },
//    'gdpro_user_account.service.login' => function ($services) {
//            return new \GdproUserAccount\Service\LoginService(
//                $services->get('doctrine.authenticationadapter.odm_default'),
//                $services->get('zend.authentication.authentication_service')
//            );
//        },
//
//    // Mail - Message
//    'gdpro_user_account.mail.message.signup' => function ($services) {
//            $config = $services->get('config');
//
//            return new \GdproMail\Mail\Message(
//                $config['mail']['message']['signup'],
//                $services->get('ViewRenderer'),
//                $config['mail']['smtp']['signup']['username']
//            );
//        },
//    // Mail - Transport - Smtp
//    'gdpro_user_account.mail.transport.smtp.signup' => function ($services) {
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