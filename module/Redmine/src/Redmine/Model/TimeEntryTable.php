<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class TimeEntryTable
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

     public function saveTimeEntry(TimeEntry $timeEntry)
     {

         $data = array(
             'entry_id' => $timeEntry->entry_id,
             'project_id'  => $timeEntry->project_id,
             'comments' => $timeEntry->comments,
             'activity_id'  => $timeEntry->activity_id,
             'issue_id' => $timeEntry->issue_id,
             'created_on'  => $timeEntry->created_on,
             'user_id' => $timeEntry->user_id,
             'hours'  => $timeEntry->hours,
             'spent_on' => $timeEntry->spent_on,
             'updated_on'  => $timeEntry->updated_on,
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
