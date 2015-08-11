<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class TrackersTable
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

     public function saveTrackers(Trackers $trackers)
     {
         $data = array(

             'tracker_id' => $trackers->trackerId,
             'tracker_name'  => $trackers->trackerName,
            

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
