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

    'controllers' => [
        'invokables' => [
            'GdproUser\Controller\Registration' => 'GdproUser\Controller\RegistrationController',
        ],
        'factories' => [
            'GdproUser\Controller\Activation' => 'GdproUser\Factory\Controller\ActivationControllerFactory',
            'GdproUser\Controller\Login' => 'GdproUser\Factory\Controller\LoginControllerFactory',
            'GdproUser\Controller\Logout' => 'GdproUser\Factory\Controller\LogoutControllerFactory',
        ]
    ],

    'hydrators' => [
        'factories' => [
            'gdpro_user.hydrator.user' => 'GdproUser\Factory\Hydrator\UserHydratorFactory'
        ]
    ],

    'view_manager' => [
        'template_map' => [
            // Mail
            'gdpro_user/mail/user/activation' => __DIR__ . '/../view/mail/user/registration.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],

    'console' => [
        'router' => [
            'routes' => [
                'user-reset-password' => [
                    'options' => [
                        'route'    => 'user-account reset-password [--verbose|-v] <userEmail>',
                        'defaults' => [
                            'controller' => 'GdproUser\Command\Index',
                            'action'     => 'resetpassword'
                        ]
                    ]
                ]
            ]
        ]
    ],

    'session_containers' => [
        'gdpro_user.login_redirection',
    ],

    'service_manager' => include 'service_manager.config.php',
    'router' => include 'router.config.php',
    'doctrine' => include 'doctrine.config.php',
];

