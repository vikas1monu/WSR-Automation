<?php
  namespace SummaryAutomation\Model;

class Project 
 {
     public $id;
     public $identifier;
     public $name;
     public $createdOn; 
     public $updatedOn;
     public $description;

     public function exchangeArray($data)
     {
         $this->id     = (isset($data['projectId']))     ? $data['projectId']     : null;
         $this->identifier = (isset($data['projectIdentifier'])) ? $data['projectIdentifier'] : null;
         $this->name  = (isset($data['projectName']))  ? $data['projectName']  : null;
         $this->createdOn     = (isset($data['createdOn']))     ? $data['createdOn']     : null;
         $this->updatedOn = (isset($data['updatedOn'])) ? $data['updatedOn'] : null;
         $this->description  = (isset($data['description']))  ? $data['description']  : null;
     }


      public function getArrayCopy()
     {
         return get_object_vars($this);
     }

}