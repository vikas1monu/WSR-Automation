<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class UserTable
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

     public function saveUser(User $user)
     {

         $data = array(
             'user_id' => $user->user_id,
             'last_name'  => $user->last_name,
             'last_login_on' => $user->last_login_on,
             'created_on'  => $user->created_on,
             'mail' => $user->mail,
             'first_name'  => $user->first_name,
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
