<?php
  namespace Redmine\Model;

class Roles 
 {
     

 public $role_id;
 public $role_name;
 

     public function exchangeArray($data)
     {    
         $this->role_id = (isset($data['id'])) ? $data['id'] : null ;
         $this->role_name = (isset($data['name'])) ? $data['name'] : null;
         
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}