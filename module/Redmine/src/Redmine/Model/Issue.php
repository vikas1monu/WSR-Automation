<?php
  namespace Redmine\Model;

class Issue 
 {
     public $issue_id;
     public $estimated_hours;
    public $subject;
public $spent_hours;
public $created_on;
public $start_date;
public $updated_on;
public $ratio_done;
public $due_date;
public $description;
public $tracker_id;
public $status_id;
public $project_id;
public $assigneeId;
public $priority_id;
public $parent_id;
public $author_id;



     public function exchangeArray($data)
     {    
         $this->issue_id     = (isset($data['id'])) ? $data['id'] : null ;
        
         $this->estimated_hours  = (isset($data['estimated_hours']))  ? $data['estimated_hours']  : null;
         $this->subject     = (isset($data['subject']))     ? $data['subject']     : null;
         $this->spent_hours = (isset($data['spent_hours'])) ? $data['spent_hours'] : null;
         $this->created_on  = (isset($data['created_on']))  ? $data['created_on']  : null;
         $this->start_date     = (isset($data['start_date'])) ? $data['start_date'] : null ;
         $this->updated_on = (isset($data['updated_on'])) ? $data['updated_on'] : null;
         $this->ratio_done  = (isset($data['done_ratio']))  ? $data['done_ratio']  : null;
         $this->due_date     = (isset($data['due_date']))     ? $data['due_date']     : null;
         $this->description = (isset($data['description'])) ? $data['description'] : null;
         $this->tracker_id  = (isset($data['tracker']['id']))  ? $data['tracker']['id']  : null;
          $this->status_id     = (isset($data['status']['id'])) ? $data['status']['id'] : null ;
         $this->project_id = (isset($data['project']['id'])) ? $data['project']['id'] : null;
         $this->assigneeId  = (isset($data['assigned_to']['id']))  ? $data['assigned_to']['id']  : null;
         $this->priority_id     = (isset($data['priority']['id']))     ? $data['priority']['id']     : null;
         $this->parent_id = (isset($data['parent']['id'])) ? $data['parent']['id'] : null;
         $this->author_id  = (isset($data['author']['id']))  ? $data['author']['id']  : null;
        
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}