<?php
  namespace Redmine\Model;

class User 
 {
     
     public $user_id;
public $last_name;
public $last_login_on;
public $created_on;
public $mail;
public $first_name;


     public function exchangeArray($data)
     {    
         $this->user_id = (isset($data['id'])) ? $data['id'] : null ;
         $this->last_name = (isset($data['lastname'])) ? $data['lastname'] : null;
         $this->last_login_on  = (isset($data['last_login_on']))  ? $data['last_login_on']  : null;
         $this->created_on     = (isset($data['created_on']))     ? $data['created_on']     : null;
         $this->mail = (isset($data['mail'])) ? $data['mail'] : null;
         $this->first_name  = (isset($data['firstname']))  ? $data['firstname']  : null;
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}