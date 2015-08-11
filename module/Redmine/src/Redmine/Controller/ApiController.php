<?php
 namespace Redmine\Controller;
 
use Redmine\Model\Helper\Client;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Redmine\Model\Projects;
use Redmine\Model\Trackers;
use Redmine\Model\IssueCategory;
use Redmine\Model\Issue;
use Redmine\Model\User;
use Redmine\Model\TimeEntry;
use Redmine\Model\Roles;
use Redmine\Model\Status;
use Redmine\Model\Activity;
use Redmine\Model\BillingCategory;

 
   
 class ApiController extends AbstractActionController
 {  
 	protected $ProjectsTable;
    protected $TrackersTable;
    protected $IssueCategoryTable;
    protected $IssueTable;
    protected $UserTable;
    protected $TimeEntryTable;
    protected $RolesTable;
    protected $StatusTable;
    protected $ActivityTable;
    protected $BillingCategoryTable;

     public function indexAction()
     {   

        // $this->billingCategory();
         //$this->allActivity(); 
        //$this->allStatus(); 
        //$this->allRoles();
        //$this->timeEntry();
        // $this->allUser(); 
         //$this->allIssue();
        //$this->allIssueCategory();
        //$this->allTrackers();
        // $this->allProjects();
    return new ViewModel(array(
             'projects' => $this->getProjectsTable()->fetchAll(),
         ));
        
    }
    

    public function allProjects()
    {
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $allProject = $client->api('project')->all();
    //echo "<pre>";print_r($allProject);die;
    $projects = new Projects();
    foreach ($allProject['projects'] as $key=>$project)
     {    
        $projects->exchangeArray($project);
       $this->getProjectsTable()->saveProjects($projects);
        }
        return true;
    }

    public function allTrackers()
    {
        $projectId = 1556;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $projectInfo = $client->api('project')->show($projectId);
     //echo "<pre>";print_r($projectInfo);die;

     $trackers = new Trackers();
     foreach ($projectInfo['project']['trackers'] as $key=>$tracker)
        { 
           $trackers->exchangeArray($tracker);
       $this->getTrackersTable()->saveTrackers($trackers);
        }
        return true;
    }
    
    public function allIssueCategory()
    {
        $projectId = 1450;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $projectInfo = $client->api('project')->show($projectId);
     //echo "<pre>";print_r($projectInfo);die;

     $issueCategory = new IssueCategory();
     foreach($projectInfo['project']['issue_categories'] as $key=>$issueCategories)
       { 
       $issueCategory->exchangeArray($issueCategories);
       $this->getIssueCategoryTable()->saveIssueCategory($issueCategory);
        }
        return true;
    }


    public function allUser()
    {
        
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $userInfo = $client->api('user')->getCurrentUser();
      //echo "<pre>";print_r($userInfo);die;
     $user = new User();
    foreach ($userInfo as $key=>$users)
       {
        $user->exchangeArray($users);
       $this->getUserTable()->saveUser($user);
        }
        return true;
    }

    public function allRoles()
    {  
        
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $userInfo = $client->api('user')->getCurrentUser();
    // echo "<pre>";print_r($userInfo);die;
    $roles = new Roles();
    foreach ($userInfo['user']['memberships'] as $key=>$value)
    {
        foreach($value['roles'] as $role) 
        {
        $roles->exchangeArray($role);
       $this->getRolesTable()->saveRoles($roles);
        }
        
    }
      return true;
   }

    public function allIssue()
    {
        $issueId = 54293;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $issueInfo = $client->api('issue')->show($issueId);
    //echo "<pre>";print_r($ issueInfo);die;

     $issue = new Issue();
       foreach($issueInfo as $key=>$value)
       {
       $issue->exchangeArray($value);
       $this->getIssueTable()->saveIssue($issue);
        }
        return true;
    }
      

    public function allStatus()
    {
        $issueId = 54293;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $issueInfo = $client->api('issue')->show($issueId);
    //echo "<pre>";print_r($ issueInfo);die;

    $status = new Status();
    foreach($issueInfo as $key=>$value)
    {
    $status->exchangeArray($value);
    $this->getStatusTable()->saveStatus($status);
    }
     return true;
    }
    
    public function timeEntry()
    {  
    $issueId = 54293;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $timeEntries = $client->api('time_entry')->all(array('issue_id' => $issueId,));
     //echo "<pre>";print_r($timeEntries);die;
    
    $timeEntry = new TimeEntry();
    foreach($timeEntries['time_entries'] as $key=>$entry)
    {
    $timeEntry->exchangeArray($entry);
    $this->getTimeEntryTable()->saveTimeEntry($timeEntry);
    }
     return true;
    }

    public function allActivity()
    {  
    $issueId = 54293;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $timeEntries = $client->api('time_entry')->all(array('issue_id' => $issueId,));
     //echo "<pre>";print_r($timeEntries);die;
    $activity = new Activity();
    foreach($timeEntries['time_entries'] as $key=>$entry)
    {
    $activity->exchangeArray($entry);
    $this->getActivityTable()->saveActivity($activity);
    }
     return true;
    }

    public function billingCategory()
    {  
    $issueId = 50620;
    $client = new Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
    $timeEntries = $client->api('time_entry')->all(array('issue_id' => $issueId,));
    //echo "<pre>";print_r($timeEntries);die;
    $billingCategory = new BillingCategory();
    foreach($timeEntries['time_entries'] as $key=>$entry)
    {
        foreach ($entry['custom_fields'] as $key=>$value)
        {    
        $billingCategory->exchangeArray($value);
       $this->getBillingCategoryTable()->saveBillingCategory($billingCategory);
        }
    }
        return true;
    }
    
    public function getProjectsTable()
     {
         if (!$this->ProjectsTable) {
             $sm = $this->getServiceLocator();
             $this->projectsTable = $sm->get('Redmine\Model\ProjectsTable');
         }
         return $this->projectsTable;
     }
    
    public function getTrackersTable()
     {
         if (!$this->TrackersTable) {
             $sm = $this->getServiceLocator();
             $this->trackersTable = $sm->get('Redmine\Model\TrackersTable');
         }
         return $this->trackersTable;
     }

    public function getIssueCategoryTable()
     {
         if (!$this->IssueCategoryTable) {
             $sm = $this->getServiceLocator();
             $this->issueCategoryTable = $sm->get('Redmine\Model\IssueCategoryTable');
         }
         return $this->issueCategoryTable;
     }

    public function getUserTable()
     {
         if (!$this->UserTable) {
             $sm = $this->getServiceLocator();
             $this->userTable = $sm->get('Redmine\Model\UserTable');
         }
         return $this->userTable;
     }

    public function getRolesTable()
     {
         if (!$this->RolesTable) {
             $sm = $this->getServiceLocator();
             $this->rolesTable = $sm->get('Redmine\Model\RolesTable');
         }
         return $this->rolesTable;
     }

    public function getIssueTable()
     {
         if (!$this->IssueTable) {
             $sm = $this->getServiceLocator();
             $this->issueTable = $sm->get('Redmine\Model\IssueTable');
         }
         return $this->issueTable;
     }

    public function getStatusTable()
     {
         if (!$this->StatusTable) {
             $sm = $this->getServiceLocator();
             $this->statusTable = $sm->get('Redmine\Model\StatusTable');
         }
         return $this->statusTable;
     }

    public function getTimeEntryTable()
     {
         if (!$this->TimeEntryTable) {
             $sm = $this->getServiceLocator();
             $this->timeEntryTable = $sm->get('Redmine\Model\TimeEntryTable');
         }
         return $this->timeEntryTable;
     }
    
    public function getActivityTable()
     {
         if (!$this->ActivityTable) {
             $sm = $this->getServiceLocator();
             $this->activityTable = $sm->get('Redmine\Model\ActivityTable');
         }
         return $this->activityTable;
     }

    public function getBillingCategoryTable()
     {
         if (!$this->BillingCategoryTable) {
             $sm = $this->getServiceLocator();
             $this->billingCategoryTable = $sm->get('Redmine\Model\BillingCategoryTable');
         }
         return $this->billingCategoryTable;
     }
 }
