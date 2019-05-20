<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class PictureManager extends Manager
{
    public function getFirstPicture()
    {
        $db = $this->dbConnect();
        $firstPicture = $db->prepare('SELECT * FROM pictures AS p INNER JOIN projects AS pr ON p.project_id=pr.id WHERE first_picture=1 AND project_id=? ORDER BY project_id');
        $firstPicture->execute(array());
        
        return $firstPicture;
    }
    
    public function getPictures($projectId)
    {
        $db = $this->dbConnect();
        $pictures = $db->prepare('SELECT id, project_id, src, first_picture FROM pictures WHERE project_id = ? AND first_picture = 0 ORDER BY id');
        $pictures->execute(array($projectId));

        return $pictures;
    }
    
    public function uploadFirstPicture($projectId, $src)
    {
        $db = $this->dbConnect();
        $pictures = $db->prepare('INSERT INTO pictures(project_id, src, first_picture) VALUES(?,?,1)' );
        $pictures->execute(array($projectId, $src));

        return $pictures;
        
        $req->closeCursor(); 
    }
    
    
    
}