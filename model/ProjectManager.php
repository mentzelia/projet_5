<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class ProjectManager extends Manager
{
    public function getProjects()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT *, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM pictures AS p INNER JOIN projects AS pr ON p.project_id=pr.id WHERE first_picture=1 ORDER BY project_id');

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
    
    public function sendProject($project_title, $short_description, $complete_description, $website_link, $skills)
    {
        $db = $this->dbConnect();
        $projects = $db->prepare('INSERT INTO projects(project_title, short_description, complete_description, website_link, skills, creation_date) VALUES(?, ?, ?, ?, ?, NOW())');
        $dataProject= $projects->execute(array($project_title, $short_description, $complete_description, $website_link, $skills));

        return $dataProject;
        
        $req->closeCursor();  
        
    }
    
    public function sendModifiedProject($project_title, $short_description, $complete_description, $website_link, $skills, $projectId)
    {
        $db = $this->dbConnect();
        $projects = $db->prepare('UPDATE projects SET project_title = ?, short_description = ?, complete_description = ?, website_link = ?, skills = ? WHERE id = ?');
        $dataProject = $projects->execute(array($project_title, $short_description, $complete_description, $website_link, $skills, $projectId));

        return $dataProject;
        
        $req->closeCursor();  
        
    }
    
    public function deleteSelectedProject($projectId)
    {
        $db = $this->dbConnect();
        $projects = $db->prepare('DELETE FROM projects WHERE id = ?');
        $deletedProject = $projects->execute(array($projectId));

        return $deletedProject;
        
        $req->closeCursor();
    }
    
}