<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class ProjectManager extends Manager
{
    public function getProjects()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, project_title, short_description, complete_description, website_link, skills, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM projects ORDER BY creation_date');

        return $req;
    }
    
    public function getProject($projectId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, project_title, short_description, complete_description, website_link, skills, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM projects WHERE id = ?');
        $req->execute(array($projectId));
        $project = $req->fetch();

        return $project;
    }
    
}