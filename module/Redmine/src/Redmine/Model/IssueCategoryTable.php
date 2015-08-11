<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class IssueCategoryTable
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

     public function saveIssueCategory(IssueCategory $issueCategory)
     {
         $data = array(

             'category_id' => $issueCategory->issueCategoryId,
             'category_name'  => $issueCategory->issueCategoryName,
            

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
