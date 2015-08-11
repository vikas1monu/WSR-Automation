<?php
  namespace Redmine\Model;

class IssueCategory 
 {
     public $issueCategoryId;
     public $issueCategoryName;
     

     public function exchangeArray($data)
     {    
         $this->issueCategoryId     = (isset($data['id'])) ? $data['id'] : null ;
         $this->issueCategoryName = (isset($data['name'])) ? $data['name'] : null;
         
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}