<?php

require_once('model/ProjectManager.php');
require_once('model/PictureManager.php');
require_once('model/UserManager.php'); 

function adminDashboard()
{
    require('view/backend/dashboardView.php');
}

function logOutSession()
{
    $_SESSION = array();
    session_destroy();
    
    require('view/backend/logOutView.php');
}

function getCreateProjectPage(){
    require('view/backend/createProjectView.php');
}

function sendProject($project_title, $short_description, $complete_description, $website_link, $skills, $firstPicture, $secondPicture, $thirdPicture){
    
    //envoie du projet
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);
    
    $sendProject = $projectManager->sendProject($project_title, $short_description, $complete_description, $website_link, $skills);
    
    
    //image1
    $extension = substr(strrchr($_FILES['first-picture']['name'],'.'),1);
    
    $timeStamp = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
    
    $fileName = $timeStamp.'.'.$extension;
    
    $destFirstPicture = 'C:\wamp64\www\projet_5\public\uploads\first-picture\\'.$fileName;
    move_uploaded_file($_FILES['first-picture']['tmp_name'],$destFirstPicture);
    
    
    
    //image2
    $extension = substr(strrchr($_FILES['second-picture']['name'],'.'),1);
    $timeStamp = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
    $fileName = $timeStamp.'.'.$extension;
    
    $destSecondPicture = 'C:\wamp64\www\projet_5\public\uploads\second-picture\\'.$fileName;
    move_uploaded_file($_FILES['second-picture']['tmp_name'],$destSecondPicture);
    
    
    //image3
    $extension = substr(strrchr($_FILES['third-picture']['name'],'.'),1);
    $timeStamp = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
    $fileName = $timeStamp.'.'.$extension;
    
    $destThirdPicture = 'C:\wamp64\www\projet_5\public\uploads\third-picture\\'.$fileName;
    move_uploaded_file($_FILES['third-picture']['tmp_name'],$destThirdPicture);
    
    
    header('Location:index.php?action=showDashboard'); 
}

function getProjectToModify(){
    
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager(); 
    $projects = $projectManager->getProjects(); 
    
    require('view/backend/listProjectsView.php'); 
}

function modifyProject($projectId)
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();

    $project = $projectManager->getProject($projectId);

    require('view/backend/modifyProjectView.php');
}

function sendModifiedProject($project_title, $short_description, $complete_description, $website_link, $skills, $projectId)
{
    
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);

    
    $sendModifiedProject = $projectManager->sendModifiedProject($project_title, $short_description, $complete_description, $website_link, $skills, $projectId);
    
    header('Location:index.php?action=showDashboard'); 
    
}

function deleteProject($projectId)
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    $project = $projectManager->deleteSelectedProject($projectId);
    
    header('Location:index.php?action=showDashboard'); 

}
