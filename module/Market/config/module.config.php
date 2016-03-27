<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'market-index-controller' => 'Market\Controller\IndexController',
            'market-view-controller' => 'Market\Controller\ViewController',
        ),
        'factories' => array(
            'market-post-controller' => 'Market\Factory\PostControllerFactory',
        ),
        'aliases' => array(
            'alt' => 'market-view-controller',
        )
    ),
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller' => 'market-index-controller',
                        'action' => 'index',
                    ),
                ),
            ),
            'market' => array(
                'type' => 'Literal',
                'options' => array(
                    // Change this to something specific to your module
                    'route' => '/market',
                    'defaults' => array(
                        // Change this value to reflect the namespace in which
                        // the controllers for your module are found
                        'controller' => 'market-index-controller',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'view' => array(
                        'type' => 'Literal',
                        'options' => array(
                            // Change this to something specific to your module
                            'route' => '/view',
                            'defaults' => array(
                                // Change this value to reflect the namespace in which
                                // the controllers for your module are found
                                'controller' => 'market-view-controller',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'main' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/main[/:category]',
                                    'defaults' => array(
                                        'action' => 'index',
                                    ),
                                ),
                            ),
                            'item' => array(
                                'type' => 'Segment',
                                'options' => array(
                                    'route' => '/item[/:itemId]',
                                    'constraints' => array(
                                        'itemId' => '[0-9]*',
                                    ),
                                    'defaults' => array(
                                        'action' => 'item',
                                    ),
                                ),
                            ),
                            'slash' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/',
                                    'defaults' => array(
                                        'controller' => 'market-view-controller',
                                        'action' => 'index',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'post' => array(
                        'type' => 'Literal',
                        'options' => array(
                            // Change this to something specific to your module
                            'route' => '/post',
                            'defaults' => array(
                                // Change this value to reflect the namespace in which
                                // the controllers for your module are found
                                'controller' => 'market-post-controller',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    /*
      'market-post' => array(
      'type' => 'Literal',
      'options' => array(
      // Change this to something specific to your module
      'route' => '/market/post',
      'defaults' => array(
      // Change this value to reflect the namespace in which
      // the controllers for your module are found
      'controller' => 'market-post-controller',
      'action' => 'index',
      ),
      ),
      ),
      'market-view' => array(
      'type' => 'Literal',
      'options' => array(
      // Change this to something specific to your module
      'route' => '/market/view',
      'defaults' => array(
      // Change this value to reflect the namespace in which
      // the controllers for your module are found
      'controller' => 'market-view-controller',
      'action' => 'index',
      ),
      ),
      'may_terminate' => true,
      'child_routes' => array(
      'default' => array(
      'type' => 'Segment',
      'options' => array(
      'route' => '/main[/:category]',
      'defaults' => array(
      'action' => 'index',
      ),
      ),
      ),
      'slash' => array(
      'type' => 'Literal',
      'options' => array(
      'route' => '/',
      'defaults' => array(
      'controller' => 'market-view-controller',
      'action' => 'index',
      ),
      ),
      ),
      'item' => array(
      'type' => 'Segment',
      'options' => array(
      'route' => '/item[/:itemId]',
      'constraints' => array(
      'itemId' => '[0-9]*',
      ),
      'defaults' => array(
      'action' => 'item',
      ),
      ),
      ),
      ),
      ), */
    'view_manager' => array(
        'template_path_stack' => array(
            'Market' => __DIR__ . '/../view',
        ),
    ),
);
