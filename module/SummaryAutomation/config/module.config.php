<?php
 return array(
     'controllers' => array(
         'invokables' => array(
             'SummaryAutomation\Controller\Project' => 'SummaryAutomation\Controller\ProjectController',
         ),
     ),

     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'project' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/project[/:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'SummaryAutomation\Controller\Project',
                         'action'     => 'index',
                     ),
                 ),
             ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'summary-automation' => __DIR__ . '/../view',
         ),
     ),
 );


 ?>