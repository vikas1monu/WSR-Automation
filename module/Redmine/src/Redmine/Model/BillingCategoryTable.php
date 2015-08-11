<?php
namespace Redmine\Model;

 use Zend\Db\TableGateway\TableGateway;

 class BillingCategoryTable
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

     public function saveBillingCategory(BillingCategory $billingCategory)
     {

 
         $data = array(
             'billing_id' => $billingCategory->billing_id,
             'billing_name'  => $billingCategory->billing_name,
             'billing_type'  => $billingCategory->billing_value
 
 

         );
        
        $this->tableGateway->insert($data);
         
     }

 }
