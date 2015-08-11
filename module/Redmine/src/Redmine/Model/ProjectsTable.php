<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class ProjectsTable
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

     public function saveProjects(Projects $projects)
     {
         $data = array(
             'projectId' => $projects->id,
             'projectIdentifier'  => $projects->identifier,
             'projectName' => $projects->name,
             'createdOn'  => $projects->createdOn,
             'updatedOn' => $projects->updatedOn,
             'description'  => $projects->description,
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
