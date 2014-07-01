<?php
return [
    'service_manager' => [
        'factories' => include 'service_manager.factories.config.php',
    ],
//    'doctrine' => include 'doctrine.config.php'

    'doctrine' => [
        'driver' => [
            'gdpro_user_account_driver' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [
                    '/../src/Entity',
                ]
            ],
            'orm_default' => [
                'drivers' => [
                    'GdproUserAccount\Entity' => 'gdpro_user_account_driver',
                ]
            ]
        ]
    ],
    'view_manager' => [
        'template_map' => array(
            // Mail
            'gdpro_user_account/mail/user/activation' => __DIR__ . '/../view/mail/user/activation.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ]
];

