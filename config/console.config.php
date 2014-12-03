<?php
return [
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
];