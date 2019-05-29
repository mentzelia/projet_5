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
    
    $destPicture = $pictureFolder.'/'.$fileName;
    
    move_uploaded_file($file['tmp_name'],$_SERVER["DOCUMENT_ROOT"].'/projet_5/public/uploads/'.$destPicture);
    
    return $destPicture;
    
}

function sendPictures($project_id, $src1, $src2, $src3) {
    
    $pictureManager = new OpenClassRooms\Duboscq\Virginie\PictureManager();
    
    $sendFirstPicture = $pictureManager->sendFirstPicture($project_id, $src1);
    
    $sendPicture = $pictureManager->sendPicture($project_id, $src2);
    $sendPicture = $pictureManager->sendPicture($project_id, $src3);
}

function sendProject($project_title, $short_description, $complete_description, $website_link, $skills, $firstPicture, $secondPicture, $thirdPicture){
    
    //project sending
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);
    
    $project_id = $projectManager->sendProject($project_title, $short_description, $complete_description, $website_link, $skills);
    

    
    //pictures sending in Folder -> retourne le chemin du fichier
    $picture1 = sendPictureInFolder($firstPicture, 'first-picture');
    $picture2 = sendPictureInFolder($secondPicture, 'second-picture');
    $picture3 = sendPictureInFolder($thirdPicture, 'third-picture');
    

  
    //pictures sending in DB 
    $picture1 = htmlspecialchars($picture1);
    $picture2 = htmlspecialchars($picture2);
    $picture3 = htmlspecialchars($picture3);
    $sentPictures = sendPictures($project_id, $picture1, $picture2, $picture3);
    
    header('Location:index.php?action=showDashboard'); 
}

function getProjectToModify(){
    
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager(); 
    $projects = $projectManager->getProjects(); 
    
    require('view/backend/listProjectsView.php'); 
}

function deletedPictures($project_id)
{
    $pictureManager = new OpenClassRooms\Duboscq\Virginie\PictureManager();
    
    $pictures = $pictureManager->deletePicture($project_id);
}

function modifyProject($projectId)
{
    //delete old photos
    $deletedPictures = deletedPictures($projectId);
    
    //get data from db
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    $project = $projectManager->getProject($projectId);


    require('view/backend/modifyProjectView.php');
}

function sendModifiedProject($project_title, $short_description, $complete_description, $website_link, $skills, $projectId, $firstPicture, $secondPicture, $thirdPicture)
{
    //send new data
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    
    $project_title = htmlspecialchars($project_title);
    $short_description = htmlspecialchars($short_description);
    $website_link = htmlspecialchars($website_link);
    $skills = htmlspecialchars($skills);

    
    $sendModifiedProject_id = $projectManager->sendModifiedProject($project_title, $short_description, $complete_description, $website_link, $skills, $projectId);
    
    //delete old pictures
    $deletedPictures = deletedPictures($sendModifiedProject_id);
    
    //pictures sending in Folder -> retourne le chemin du fichier
    $picture1 = sendPictureInFolder($firstPicture, 'first-picture');
    $picture2 = sendPictureInFolder($secondPicture, 'second-picture');
    $picture3 = sendPictureInFolder($thirdPicture, 'third-picture');
    

  
    //pictures sending in DB 
    $picture1 = htmlspecialchars($picture1);
    $picture2 = htmlspecialchars($picture2);
    $picture3 = htmlspecialchars($picture3);
    $sentPictures = sendPictures($sendModifiedProject_id, $picture1, $picture2, $picture3);
    
    header('Location:index.php?action=showDashboard'); 
    
}

function deleteProject($projectId)
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    $project = $projectManager->deleteSelectedProject($projectId);
    
    header('Location:index.php?action=showDashboard'); 

}
