<?php
  namespace Redmine\Model;

class Billingcategory 
 {
     

 public $billing_id;
 public $billing_name;
 public $billing_value;
 

     public function exchangeArray($data)
     {    
         $this->billing_id = (isset($data['id'])) ? $data['id'] : null ;
         $this->billing_name = (isset($data['name'])) ? $data['name'] : null;
         $this->billing_value = (isset($data['value'])) ? $data['value'] : null;
         
         
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}