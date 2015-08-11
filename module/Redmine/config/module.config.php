<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'Redmine\Controller\Api' => 'Redmine\Controller\ApiController',
         ),
     ),

     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'api' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/api[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'Redmine\Controller\Api',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'redmine' => __DIR__ . '/../view',
         ),
     ),
 );


 ?>