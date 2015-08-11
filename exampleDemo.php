<?php
require_once 'lib/autoload.php';
require_once 'db_connection.php';

$projectId = 1450;
$issueId = 50620;




// --> with Username/Password
$client = new Redmine\Client("https://portal.optimusinfo.com/redmine/", 'vikas.singhal', 'vzi950');
 //echo "<pre>";print_r($client);die;



// Projects

//show all Projects in your account with description
$allProject = $client->api('project')->all();
//echo "<pre>";print_r($allProject);die;


//------------projectsTable-----------------------------
// foreach ($allProject['projects'] as $key=>$project)
//  {
// $query = "INSERT INTO projects 
// VALUES ('$project[id]','$project[identifier]',
//     '$project[name]','$project[created_on]',
//     '$project[updated_on]','$project[description]')";
// $resultset=mysqli_query($connection,$query);
// }


//show a particluar project details by the project id
 $projectInfo = $client->api('project')->show($projectId);
 //echo "<pre>";print_r($projectInfo);die;


//-----trackersTable---------------------
// foreach ($projectInfo['project']['trackers'] as $key=>$track)
//  { 
//  $projectId = $projectInfo['project']['id'];
// $query = "INSERT INTO trackersTable (tracker_id,tracker_name,projectId)
// VALUES ('$track[id]','$track[name]','$projectId')";
// $resultset=mysqli_query($connection,$query);
// } 
  
    
//-----------------issue _categoriesTable----------
// foreach ($projectInfo['project']['issue_categories'] as $key=>$issuecategory)
//  { 
//  $projectId = $projectInfo['project']['id'];
// $query = "INSERT INTO categoryTable (category_id,category_name,projectId)
// VALUES ('$issuecategory[id]','$issuecategory[name]','$projectId')";
// $resultset=mysqli_query($connection,$query);
// }



// Users

//get the current user ie vikas singhal information 
$userInfo = $client->api('user')->getCurrentUser();
//echo "<pre>";print_r($userInfo);die;

//--------------userTable---------------
// foreach ($userInfo as $key=>$user)
// {
// $query = "INSERT INTO userTable
// VALUES ('$user[id]','$user[lastname]','$user[last_login_on]',
//   '$user[created_on]',
//   '$user[mail]','$user[firstname]')";
// $resultset=mysqli_query($connection,$query);

// }
 //------------Memberships/Role--Table-----------------
// foreach ($userInfo['user']['memberships'] as $key=>$value)
// { 
//   foreach($value['roles'] as $role) 
//   {
//     $id = $value['project']['id'];
//     $query = "INSERT INTO memberships
// VALUES ('$value[id]','$id','$role[id]','$role[name]')";
// $resultset=mysqli_query($connection,$query);
  
//   }
// }


// Issues

//get the existing issue information
$issueInfo = $client->api('issue')->show($issueId);
//echo "<pre>";print_r($issueInfo);die;

//----------issuetable-----------------
// foreach($issueInfo as $key=>$value)
//   {
//     $trackerId = $value['tracker']['id'];
//     $statusId =$value['status']['id'];
//     $projectId = $value['project']['id'];
//     $assigneId =$value['assigned_to']['id'];
//     $priorityId = $value['priority']['id'];
//     $parentId = $value['parent']['id'];
//     $authorId = $value['author']['id'];
// $query = "INSERT INTO issueTable 
// VALUES ('$value[id]','$value[estimated_hours]',
//     '$value[subject]','$value[spent_hours]',
//     '$value[created_on]','$value[start_date]',
//     '$value[updated_on]','$value[done_ratio]',
//     '$value[due_date]','$value[description]',
//     '$trackerId','$statusId','$projectId',
//     '$assigneId','$priorityId','$parentId','$authorId'
// )";
// $resultset=mysqli_query($connection,$query);
// }

// //-------------status table---------------
// foreach($issueInfo as $key=>$value)
//   {
//     $statusId = $value['status']['id'];
//     $statusName =$value['status']['name'];
//     $issueId = $value['id'];

// $query = "INSERT INTO status 
// VALUES ('$statusId','$statusName','$issueId')";
// $resultset=mysqli_query($connection,$query);
// }
  


// Time entries

//get the time entry for all dates
$timeEntry = $client->api('time_entry')->all(array(
  'issue_id' => $issueId,
    ));
//echo "<pre>";print_r($timeEntry);die;

// //-----------timeEntries Table--------------------
// foreach($timeEntry['time_entries'] as $key=>$entry)
//   {
    
//     $projectId= $entry['project']['id'];
//     $activityId= $entry['activity']['id'];
//     $issueId= $entry['issue']['id'];
//     $userId= $entry['user']['id'];
//    $query = "INSERT INTO timeEntries 
// VALUES ('$entry[id]','$projectId',
//     '$entry[comments]','$activityId',
//     '$issueId','$entry[created_on]',
//     '$userId','$entry[hours]',
//     '$entry[spent_on]','$entry[updated_on]')";
// $resultset=mysqli_query($connection,$query);
// }
  

  //------------Activity table-----------------
// foreach($timeEntry['time_entries'] as $key=>$entry)
//   {
    
//     $activityId= $entry['activity']['id'];
//     $activityName= $entry['activity']['name'];
//     $query = "INSERT INTO activities 
// VALUES ('$activityId','$activityName')";
// $resultset=mysqli_query($connection,$query);
// }

// //---------billingCategory--table-------------
// foreach($timeEntry['time_entries'] as $key=>$entry)
//   {
//     foreach ($entry['custom_fields'] as $key=>$value)
//     {
//       $issueId= $entry['issue']['id'];
//      $query = "INSERT INTO billingCategory 
// VALUES ('$value[id]','$value[name]','$value[value]','$issueId')";
//   $resultset=mysqli_query($connection,$query);
//     }

// }
     
//-------------RedmineTable-----------------
//number of hours logged in current/last month 
    $x= 0;
    $y = 0;
foreach($timeEntry['time_entries'] as $key=>$entry)
  {
     //echo "<pre>";print_r($entry['id']);
    if($entry['spent_on']>=date('Y-m-01') && $entry['spent_on']<=date('Y-m-t'))
      {
        $x+=$entry['hours'];
        
      }
    if($entry['spent_on']>=date("Y-m-d", mktime(0, 0, 0, date("m")-1, 1, date("Y"))) && $entry['spent_on']<=date("Y-m-d", mktime(0, 0, 0, date("m"), 0, date("Y"))))
      {
        $y+=$entry['hours'];
      }
    }
$query = "INSERT INTO redmineTable VALUES ('$y','$x')";
$resultset=mysqli_query($connection,$query);
