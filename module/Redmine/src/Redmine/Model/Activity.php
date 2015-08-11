<?php
  namespace Redmine\Model;

class Activity 
 {
     

 public $activity_id;
 public $activity_name;
 

     public function exchangeArray($data)
     {    
         $this->activity_id = (isset($data['activity']['id'])) ? $data['activity']['id'] : null ;
         $this->activity_name = (isset($data['activity']['name'])) ? $data['activity']['name'] : null;
         
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}