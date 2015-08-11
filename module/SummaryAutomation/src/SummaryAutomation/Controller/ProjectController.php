<?php
 namespace SummaryAutomation\Controller;

 use Zend\Mvc\Controller\AbstractActionController;
 use Zend\View\Model\ViewModel;
 use SummaryAutomation\Model\Project;          // <-- Add this 
   
 class ProjectController extends AbstractActionController
 {   

 	protected $projectTable;
      
    public function indexAction()
     {
         return new ViewModel(array(
             'projects' => $this->getProjectTable()->fetchAll(),
         ));
     }


 public function getProjectTable()
     {
         if (!$this->projectTable) {
             $sm = $this->getServiceLocator();
             $this->projectTable = $sm->get('SummaryAutomation\Model\ProjectTable');
         }
         return $this->projectTable;
     }
 }
 ?>