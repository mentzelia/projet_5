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

function sendProject($project_title, $short_description, $complete_description, $website_link, $skills){
    
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);
    
    $sendProject = $projectManager->sendProject($project_title, $short_description, $complete_description, $website_link, $skills);
    
    header('Location:index.php?action=showDashboard'); 
}