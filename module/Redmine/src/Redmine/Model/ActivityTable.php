<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class ActivityTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function saveActivity(Activity $activity)
     {

 
         $data = array(
             'activity_id' => $activity->activity_id,
             'activity_name'  => $activity->activity_name
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
