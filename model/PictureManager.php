<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class PictureManager extends Manager
{
    public function getPictures($projectId)
    {
        $db = $this->dbConnect();
        $pictures = $db->prepare('SELECT id, project_id, src FROM pictures WHERE project_id = ? ORDER BY id DESC');
        $pictures->execute(array($projectId));

        return $pictures;
    }
    
}