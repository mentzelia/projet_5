<?php

require_once('model/ProjectManager.php');
require_once('model/PictureManager.php');
require_once('model/UserManager.php');

function listProjects()
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager(); 
    
    $projects = $projectManager->getProjects(); 

    require('view/frontend/listProjectsView.php');
}

function project($projectId)
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    $pictureManager = new OpenClassRooms\Duboscq\Virginie\PictureManager();

    $project = $projectManager->getProject($projectId);
    $pictures = $pictureManager->getPictures($projectId);

    require('view/frontend/projectView.php');
}

function about()
{
    require('view/frontend/aboutView.php');
}

function contact()
{
    require('view/frontend/contactView.php');
}

function quotation()
{
    require('view/frontend/quotationView.php');
}

function GetRegisterForm()
{
    require('view/frontend/registerView.php');
}

function addUser($login, $password1, $password2, $email)
{
    $userManager = new OpenClassRooms\Duboscq\Virginie\UserManager();
    
    $login = htmlspecialchars($login);
    $password1 = htmlspecialchars($password1);
    $email = htmlspecialchars($email);
    $result = $userManager->addUser($login, $password1, $email);
    
    header('Location:index.php?action=log_in');
               
}

function GetLogInForm()
{
    require('view/frontend/loginView.php');
}