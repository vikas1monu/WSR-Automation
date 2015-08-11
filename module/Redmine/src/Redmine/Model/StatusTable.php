<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class StatusTable
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

     public function saveStatus(Status $status)
     {

         $data = array(
             'status_id' => $status->status_id,
             'status_name'  => $status->status_name,
             'issue_id' => $status->issue_id
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
