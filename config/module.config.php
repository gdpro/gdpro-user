<?php
return [
    'gdpro_user' => [
        'entity_class' => 'GdproUser\Entity\User',
        'registration' => [
            'send_email_activation' => [
                'enabled' => true,
            ],
        ],
        'reset-email' => [
        ],
        'reset-password' => [
        ],
        'password_hashing' => [
            'cost' => '10',
            'salt' => 'This is my very long salt key. Secret of course!'
        ],
//
//        'session' => [
//            'config' => [
//                'class' => 'Zend\Session\Config\SessionConfig',
//                'options' => [
//                    'name' => 'gdpro_user'
//                ]
//            ],
//            'storage' => 'Zend\Session\Storage\SessionArrayStorage',
//            'validators' => [
//                [
//                    'Zend\Session\Validator\RemoteAddr',
//                    'Zend\Session\Validator\HttpUserAgent'
//                ]
//            ]
//        ]
    ],

    'hydrators' => [
        'factories' => [
            'gdpro_user.hydrator.user' => 'GdproUser\Factory\Hydrator\UserHydratorFactory'
        ]
    ],

    'session_containers' => [
        'gdpro_user.login_redirection',
    ],

    'controllers' => include 'controllers.config.php',
    'console' => include 'console.config.php',
    'doctrine' => include 'doctrine.config.php',
    'router' => include 'router.config.php',
    'service_manager' => include 'service_manager.config.php',
    'view_manager' => include 'view_manager.config.php',
];

