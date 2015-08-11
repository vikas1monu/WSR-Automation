<?php
  namespace Redmine\Model;

class Trackers 
 {
     public $trackerId;
     public $trackerName;
     

     public function exchangeArray($data)
     {    
         $this->trackerId     = (isset($data['id'])) ? $data['id'] : null ;
         $this->trackerName = (isset($data['name'])) ? $data['name'] : null;
         
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}