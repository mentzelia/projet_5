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

function sendPictureInFolder($file, $pictureFolder){
    
    $extension = substr(strrchr($file['name'],'.'),1);
    
    $timeStamp = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
    
    $fileName = $timeStamp.'.'.$extension;
    
    $destPicture = $_SERVER["DOCUMENT_ROOT"].'/projet_5/public/uploads/'.$pictureFolder.'/'.$fileName;
    
    move_uploaded_file($file['tmp_name'],$destPicture);
    
    return $destPicture;
    
}

function sendPictures($projectId, $src1, $src2, $src3) {
    
    //sendFirstPicture
    $pictureManager = new OpenClassRooms\Duboscq\Virginie\PictureManager();
    
    $sendFirstPicture = $pictureManager->sendFirstPicture($projectId, $src1);
    $sendPicture = $pictureManager->sendPicture($projectId, $src2);
    $sendPicture = $pictureManager->sendPicture($projectId, $src3);
}

function sendProject($project_title, $short_description, $complete_description, $website_link, $skills, $firstPicture, $secondPicture, $thirdPicture){
    
    //project sending
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);
    
    $sendProject = $projectManager->sendProject($project_title, $short_description, $complete_description, $website_link, $skills);

    
    //pictures sending in Folder -> retourne le chemin du fichier
    $picture1 = sendPictureInFolder($firstPicture, 'first-picture');
    $picture2 = sendPictureInFolder($secondPicture, 'second-picture');
    $picture3 = sendPictureInFolder($thirdPicture, 'third-picture');
    
    
    //recuperer la valeur du timestamp - nom du fichier sans l'extension
    $ext = pathinfo($picture1, PATHINFO_EXTENSION);
    $file = basename($picture1,".".$ext);
    
    
    //recupérer l'id du projet 
    //$projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    //$getProjectId = $projectManager->getProjectId($file);
    
  
    //pictures sending in DB
    $projectId = 5;
    $picture1 = htmlspecialchars($picture1);
    $picture2 = htmlspecialchars($picture2);
    $picture3 = htmlspecialchars($picture3);
    $sentPictures = sendPictures($projectId, $picture1, $picture2, $picture3);
    
    
    
    
    //header('Location:index.php?action=showDashboard'); 
}

function getProjectToModify(){
    
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager(); 
    $projects = $projectManager->getProjects(); 
    
    require('view/backend/listProjectsView.php'); 
}

function deletedPictures($projectId)
{
    $pictureManager = new OpenClassRooms\Duboscq\Virginie\PictureManager();
    
    $pictures = $pictureManager->deletePicture($projectId);
}

function modifyProject($projectId)
{
    $deletedPictures = deletedPictures($projectId);
    
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
