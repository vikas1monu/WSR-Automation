<?php
  namespace Redmine\Model;

class Status 
 {
     

 public $status_id;
 public $status_name;
 public $issue_id;
 

     public function exchangeArray($data)
     {    
         $this->status_id = (isset($data['status']['id'])) ? $data['status']['id'] : null ;
         $this->status_name = (isset($data['status']['name'])) ? $data['status']['name'] : null;
         $this->issue_id = (isset($data['id'])) ? $data['id'] : null ;
         
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}