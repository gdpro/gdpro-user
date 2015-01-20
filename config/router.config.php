<?php
return [
    'routes' => [
        'user' => [
            'type' => 'Segment',
            'options' => [
                'route' => '/user',
                'defaults' => [
                    '__NAMESPACE__' => 'GdproUser\Controller',
                ]
            ],
            'may_terminate' => false,
            'child_routes' => [
                'registration' => [
                    'type' => 'Literal',
                    'options' => [
                        'route' => '/registration',
                        'defaults' => [
                            'controller' => 'GdproUser\Controller\Registration',
                            'action' => 'register',
                        ]
                    ],
                    'may_terminate' => true,
                    'child_routes' => [
                        'registration' => [
                            'type' => 'Literal',
                            'options' => [
                                'route' => '/confirmation',
                                'defaults' => [
                                    'controller' => 'Registration',
                                    'action' => 'confirmation'
                                ]
                            ]
                        ]
                    ]
                ],
                'activation' => [
                    'type' => 'Segment',
                    'options' => [
                        'route' => '/activation[/:activation_key]',
//                            'constraints' => [
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                            ],
                        'defaults' => [
                            '__NAMESPACE__' => 'GdproUser\Controller',
                            'controller' => 'Activation',
                            'action' => 'activate',
                        ],
                    ]
                ],
                'login' => [
                    'type' => 'Segment',
                    'options' => [
                        'route' => '/login[/:role]',
//                            'constraints' => [
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                            ],
                        'defaults' => [
                            '__NAMESPACE__' => 'GdproUser\Controller',
                            'controller' => 'Login',
                            'action' => 'login',
//                            'role' => null
                        ],
                    ]
                ],
                'logout' => [
                    'type' => 'Literal',
                    'options' => [
                        'route' => '/logout',
//                            'constraints' => [
//                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                            ],
                        'defaults' => [
                            '__NAMESPACE__' => 'GdproUser\Controller',
                            'controller' => 'Logout',
                            'action' => 'logout',
                        ],
                    ]
                ],

            ]
        ]
    ]
];