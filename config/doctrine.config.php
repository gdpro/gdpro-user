<?php
return [
//    'authentication' => array(
//        'orm_gdpro_user_account' => array(
//            'object_manager' => 'Doctrine\ORM\EntityManager',
//            'identity_class' => 'GdproUserAccount\Entity\User',
//            'identity_property' => 'email',
//            'credential_property' => 'password',
//            'credential_callable' => function($user, $passwordGiven) {
////                    return my_awesome_check_test($user->getPassword(), $passwordGiven);
//                },
//        ),
//    ),
    'configuration' => array(
        'orm_crawler' => array(
            'metadata_cache'    => 'array',
            'query_cache'       => 'array',
            'result_cache'      => 'array',
            'hydration_cache'   => 'array',
            'driver'            => 'orm_crawler',
            'generate_proxies'  => true,
            'proxy_dir'         => 'data/DoctrineORMModule/Proxy',
            'proxy_namespace'   => 'DoctrineORMModule\Proxy',
            'filters'           => array()
        )
    ),

    'driver' => array(
        'Crawler_Driver' => array(
            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
            'cache' => 'array',
            'paths' => array(
                __DIR__ . '/../src/Entity'
            )
        ),
        'orm_crawler' => array(
            'class'   => 'Doctrine\ORM\Mapping\Driver\DriverChain',
            'drivers' => array(
                'GdproUserAccount\Entity' =>  'Crawler_Driver'
            )
        ),
    ),

    'entitymanager' => array(
        'orm_crawler' => array(
            'connection'    => 'orm_crawler',
            'configuration' => 'orm_crawler'
        )
    ),

    'eventmanager' => array(
        'orm_crawler' => array()
    ),

    'sql_logger_collector' => array(
        'orm_crawler' => array(),
    ),

    'entity_resolver' => array(
        'orm_crawler' => array()
    ),
];