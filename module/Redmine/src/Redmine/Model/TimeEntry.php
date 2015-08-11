<?php
  namespace Redmine\Model;

class TimeEntry 
 {
     

 public $entry_id;
 public $project_id;
 public $comments;
 public $activity_id;
public $issue_id;
public $created_on;
public $user_id;
public $hours;
public $spent_on;
public $updated_on;


     public function exchangeArray($data)
     {    
         $this->entry_id = (isset($data['id'])) ? $data['id'] : null ;
         $this->project_id = (isset($data['project']['id'])) ? $data['project']['id'] : null;
         $this->comments  = (isset($data['comments']))  ? $data['comments']  : null;
         $this->activity_id     = (isset($data['activity']['id']))     ? $data['activity']['id']     : null;
         $this->issue_id = (isset($data['issue']['id'])) ? $data['issue']['id'] : null;
         $this->created_on  = (isset($data['created_on']))  ? $data['created_on']  : null;
         $this->user_id = (isset($data['user']['id'])) ? $data['user']['id'] : null;
         $this->hours  = (isset($data['hours']))  ? $data['hours']  : null;
         $this->spent_on = (isset($data['spent_on'])) ? $data['spent_on'] : null;
         $this->updated_on  = (isset($data['updated_on']))  ? $data['updated_on']  : null;
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}