<?php

require_once('model/ProjectManager.php');
require_once('model/PictureManager.php');
/*require_once('model/UserManager.php'); */

function listProjects()
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager(); 
    $projects = $projectManager->getProjects(); 

    require('view/frontend/listProjectsView.php');
}