<?php
namespace Redmine;
use Redmine\Model\Projects;
use Redmine\Model\ProjectsTable;
use Redmine\Model\Trackers;
use Redmine\Model\TrackersTable;
use Redmine\Model\IssueCategory;
use Redmine\Model\IssueCategoryTable;
use Redmine\Model\BillingCategory;
use Redmine\Model\BillingCategoryTable;
use Redmine\Model\Issue;
use Redmine\Model\IssueTable;
use Redmine\Model\User;
use Redmine\Model\UserTable;
use Redmine\Model\Roles;
use Redmine\Model\RolesTable;
use Redmine\Model\Status;
use Redmine\Model\StatusTable;
use Redmine\Model\TimeEntry;
use Redmine\Model\TimeEntryTable;
use Redmine\Model\Activity;
use Redmine\Model\ActivityTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;


 use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
 use Zend\ModuleManager\Feature\ConfigProviderInterface;

 class Module implements AutoloaderProviderInterface, ConfigProviderInterface
 {
     public function getAutoloaderConfig()
     {
         return array(
             'Zend\Loader\ClassMapAutoloader' => array(
                 __DIR__ . '/autoload_classmap.php',
             ),
             'Zend\Loader\StandardAutoloader' => array(
                 'namespaces' => array(
                     __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                 ),
             ),
         );
     }

     public function getConfig()
     {
         return include __DIR__ . '/config/module.config.php';
     }


     public function getServiceConfig()
     {
         return array(
            'factories' => array(
                 'Redmine\Model\ProjectsTable' =>  function($sm) {
                     $tableGateway = $sm->get('ProjectTableGateway');
                     $table = new ProjectsTable($tableGateway);
                     return $table;
                 },
                 'ProjectTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Projects());
                     return new TableGateway('projects', $dbAdapter, null, $resultSetPrototype);
                 },

                'Redmine\Model\TrackersTable' =>  function($sm) {
                     $tableGateway = $sm->get('TrackerTableGateway');
                     $table = new TrackersTable($tableGateway);
                     return $table;
                 },
                 'TrackerTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Trackers());
                     return new TableGateway('trackersTable', $dbAdapter, null, $resultSetPrototype);
                 },

                'Redmine\Model\IssueCategoryTable' =>  function($sm) {
                     $tableGateway = $sm->get('IssueCategoryTableGateway');
                     $table = new IssueCategoryTable($tableGateway);
                     return $table;
                 },
                 'IssueCategoryTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new IssueCategory());
                     return new TableGateway('issueCategory', $dbAdapter, null, $resultSetPrototype);
                 },
                'Redmine\Model\IssueTable' =>  function($sm) {
                     $tableGateway = $sm->get('IssueTableGateway');
                     $table = new IssueTable($tableGateway);
                     return $table;
                 },
                 'IssueTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Issue());
                     return new TableGateway('issue', $dbAdapter, null, $resultSetPrototype);
                 },

                 'Redmine\Model\UserTable' =>  function($sm) {
                     $tableGateway = $sm->get('UserTableGateway');
                     $table = new  UserTable($tableGateway);
                     return $table;
                 },
                 'UserTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new User());
                     return new TableGateway('userTable', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Redmine\Model\TimeEntryTable' =>  function($sm) {
                     $tableGateway = $sm->get('timeEntryTableGateway');
                     $table = new  TimeEntryTable($tableGateway);
                     return $table;
                 },
                 'timeEntryTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new TimeEntry());
                     return new TableGateway('timeEntries', $dbAdapter, null, $resultSetPrototype);
                 },

                  'Redmine\Model\RolesTable' =>  function($sm) {
                     $tableGateway = $sm->get('rolesTableGateway');
                     $table = new  RolesTable($tableGateway);
                     return $table;
                 },
                 'rolesTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Roles());
                     return new TableGateway('roles', $dbAdapter, null, $resultSetPrototype);
                 },
                  'Redmine\Model\StatusTable' =>  function($sm) {
                     $tableGateway = $sm->get('statusTableGateway');
                     $table = new  StatusTable($tableGateway);
                     return $table;
                 },
                 'statusTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Status());
                     return new TableGateway('status', $dbAdapter, null, $resultSetPrototype);
                 },
                'Redmine\Model\ActivityTable' =>  function($sm) {
                     $tableGateway = $sm->get('activityTableGateway');
                     $table = new  ActivityTable($tableGateway);
                     return $table;
                 },
                 'activityTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Activity());
                     return new TableGateway('activities', $dbAdapter, null, $resultSetPrototype);
                 },

                 'Redmine\Model\BillingCategoryTable' =>  function($sm) {
                     $tableGateway = $sm->get('billingCategoryTableGateway');
                     $table = new  BillingCategoryTable($tableGateway);
                     return $table;
                 },
                 'billingCategoryTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new BillingCategory());
                     return new TableGateway('billingCategory', $dbAdapter, null, $resultSetPrototype);
                 },


            ),
         );
     }

 }
 ?>