<?php
return [
    'gdpro_user_account' => [
        'entity_class' => 'Core\Entity\UserAccount',
        'service' => [
            'registration' => [
                'send_email_activation' => [
                    'enabled' => true,
                ],
            ],
            'reset-email' => [
            ],
            'reset-password' => [
            ]
        ]
    ],

    'gdpro_mail' => [
        'templates' => [
            'registration' => [
                'subject' => 'Account Registration',
                'view' => 'gdpro_user_account/mail/user_account/registration',
            ]
        ]
    ],

    'gdpro_user_account_mailer' => [
        'email_sending_activated' => true,
    ],

    'service_manager' => [
        'factories' => include 'service_manager.factories.config.php',
    ],

    'view_manager' => [
        'template_map' => [
            // Mail
            'gdpro_user_account/mail/user_account/activation' => __DIR__ . '/../view/mail/user-account/registration.phtml',
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
                            'controller' => 'GdproUserAccount\Command\Index',
                            'action'     => 'resetpassword'
                        ]
                    ]
                ]
            ]
        ]
    ]
];

