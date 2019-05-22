<?php

namespace OpenClassRooms\Duboscq\Virginie;
require_once("model/Manager.php"); 

class UserManager extends Manager
{
    public function addUser($login, $password1, $email)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT user FROM member_area WHERE user=?' );
        $req->execute(array($login));
            
        if ($data = $req->fetch())
        {
            echo ('Ce nom d\'utilisateur est déja pris');
            return 'erreur';
        }else
        {
            if (preg_match("#^[a-zA-Z0-9]{3,}$#", $login) AND preg_match("#^[a-zA-Z0-9!_]{5,}$#", $password1) AND preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) 
            {

                $pass_hash = password_hash($password1, PASSWORD_DEFAULT);

                $req = $db->prepare('INSERT INTO member_area (user, password, email, creation_date, role) VALUES(?, ?, ?, NOW(), 0)');

                $data = $req->execute(array($login, $pass_hash, $email));
                return $data;
            }

            else
            {
                return $error = 'Erreur';
            } 
        }
}
    
    public function getUserData($login)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, user, password, role FROM member_area WHERE user=?' );
        $req->execute(array($login));
        $data = $req->fetch();
        
        return $data;
    
    }
    
    


}