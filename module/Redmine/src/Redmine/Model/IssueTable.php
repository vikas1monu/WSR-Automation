<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class IssueTable
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function saveIssue(Issue $issue)
     {
         $data = array(
             'issue_id' => $issue->issue_id,
             'estimated_hours'  => $issue->estimated_hours,
             'subject' => $issue->subject,
             'spent_hours'  => $issue->spent_hours,
             'created_on' => $issue->created_on,
             'start_date'  => $issue->start_date,
             'updated_on' => $issue->updated_on,
             'ratio_done'  => $issue->ratio_done,
             'due_date' => $issue->due_date,
             'description'  => $issue->description,
             'tracker_id' => $issue->tracker_id,
             'status_id'  => $issue->status_id,
             'project_id' => $issue->project_id,
             'assigneeId'  => $issue->assigneeId,
             'priority_id' => $issue->priority_id,
             'parent_id'  => $issue->parent_id,
             'author_id' => $issue->author_id,
  

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
