<?php
return [
    'gdpro_user' => [
        'entity_name' => 'GdproUser\Entity\User',
        'registration' => [
            'send_email_activation' => [
                'enabled' => true,
            ],
        ],
        'reset-email' => [
        ],
        'reset-password' => [
        ]
    ],

    'service_manager' => [
        'factories' => include 'service_manager.factories.config.php',
    ],

    'controllers' => [
        'invokables' => [
            'GdproUser\Controller\UserRegistration' => 'GdproUser\Controller\UserRegistrationController',
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

    'router' => [
        'routes' => [
            'user' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/user',
                ],
                'may_terminate' => false,
                'child_routes' => [
//                    'registration' => [
//                        'type' => 'Literal',
//                        'options' => [
//                            'route' => '/registration',
//                            'defaults' => [
//                                'controller' => 'IndividualRegistration',
//                                'action' => 'register',
//                            ]
//                        ]
//                    ],
                    'registration_confirmation' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/confirmation-registration',
                            'constraints' => [
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ],
                            'defaults' => [
                                '__NAMESPACE__' => 'GdproUser\Controller',
                                'controller' => 'UserRegistration',
                                'action' => 'confirm-registration',
                            ],
                        ]
                    ]
                ]
            ]
        ]
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
    ]
];

