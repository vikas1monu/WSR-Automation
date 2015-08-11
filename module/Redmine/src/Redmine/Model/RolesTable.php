<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class RolesTable
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

     public function saveRoles(ROles $role)
     {

         $data = array(
             'role_id' => $role->role_id,
             'role_name'  => $role->role_name
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
