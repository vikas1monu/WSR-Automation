<?php
namespace SummaryAutomation\Model;

 use Zend\Db\TableGateway\TableGateway;

 class ProjectTable
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

 }
 ?>