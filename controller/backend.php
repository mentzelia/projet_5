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

function sendPictureFolder($file, $pictureFolder){
    
    $extension = substr(strrchr($file['name'],'.'),1);
    
    $timeStamp = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
    
    $fileName = $timeStamp.'.'.$extension;
    
    $destPicture = $_SERVER["DOCUMENT_ROOT"].'/projet_5/public/uploads/'.$pictureFolder.'/'.$fileName;
    
    move_uploaded_file($file['tmp_name'],$destPicture);
    
}

function sendProject($project_title, $short_description, $complete_description, $website_link, $skills, $firstPicture, $secondPicture, $thirdPicture){
    
    //project sending
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);
    
    $sendProject = $projectManager->sendProject($project_title, $short_description, $complete_description, $website_link, $skills);
    
    //pictures sending
    $picture1 = sendPictureFolder($firstPicture, 'first-picture');
    $picture2 = sendPictureFolder($secondPicture, 'second-picture');
    $picture3 = sendPictureFolder($thirdPicture, 'third-picture');
    

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
