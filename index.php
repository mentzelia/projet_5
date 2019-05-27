<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

function generalVerification($data) {
    if(isset($data)) {
        if(!empty($data)) {
            return true;
        }
    }   
}

function verifSession() {
    
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
            
    if(generalVerification($id) AND generalVerification($user)){
        return true;
    }
    
}


function verifPicture ($picture) {
                                
    if ($picture['error'] == 0 AND $picture['size']<5242880) {
        $extension = substr(strrchr($picture['name'],'.'),1);
        if ($extension == 'png' OR $extension == 'jpg' OR $extension == 'jpeg') {
           return true;
        } 
    }  
}



try {
    
    if (isset($_GET['action'])) {
        
        if ($_GET['action'] == 'listProjects') {
            listProjects();
        }       
    
        elseif ($_GET['action'] == 'project') {
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                project($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de projet envoyé');
            }
        }
        
        
        elseif ($_GET['action'] == 'about') {
            about();
        } 
        
        elseif ($_GET['action'] == 'contact') {
            contact();
        } 
        
        elseif ($_GET['action'] == 'quotation') {
            quotation();
        }
        
        elseif($_GET['action'] == 'register') {
            getRegisterForm();
        }
        
        
        elseif($_GET['action'] == 'user_registration') {
            
            $login = $_POST['login'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $email = $_POST['email'];
            
            if(generalVerification($login) AND generalVerification($password1) AND generalVerification($password2) AND generalVerification($email)) {
            
                if($password1 == $password2) {

                    addUser($login, $password1, $email);

                } 
            }  
        }
        
        
        elseif($_GET['action'] == 'log_in'){
            
            if(!empty($_SESSION['user']))
            {
                adminDashboard();
                
            }else{
                getLogInForm();
            }
            
        }
        
        elseif($_GET['action'] == 'admin_connexion'){
            
            $login = $_POST['login'];
            $password = $_POST['password'];
            
            if(generalVerification($login) AND generalVerification($password)) {
                    
                verifyUserData($_POST['login'], $_POST['password']);
                    
            }
        }
        
        elseif($_GET['action'] == 'showDashboard'){
            
            if(verifSession()){ 
                    
                    adminDashboard();
            }
        }
            
        elseif($_GET['action'] == 'log_out'){
            
            logOutSession();
        }
        
        elseif($_GET['action'] == 'createNewProject'){
            
            if(verifSession()) {
                
                getCreateProjectPage();
                
            }else{
                    getLogInForm();
            }
        }
        
        elseif($_GET['action'] == 'sendProject'){
            
            if(verifSession()){
                    
                    $title = $_POST['project_title'];
                    $shortDesc = $_POST['short_description'];
                    $completeDesc = $_POST['complete_description'];
                    $website = $_POST['website_link'];
                    $skills = $_POST['skills'];
                    $firstPic = $_FILES['first-picture'];
                    $secondPic = $_FILES['second-picture'];
                    $thirdPic = $_FILES['third-picture'];
                                    
                    if(generalVerification($title) AND generalVerification($shortDesc) AND generalVerification($completeDesc) AND generalVerification($website) AND generalVerification($skills) AND generalVerification($firstPic) AND generalVerification($secondPic) AND generalVerification($thirdPic)) {
                            
                        if (verifPicture($firstPic) AND verifPicture($secondPic) AND verifPicture($thirdPic)) {

                            sendProject($title, $shortDesc, $completeDesc, $website, $skills, $firstPic, $secondPic, $thirdPic);

                        } else echo ('erreur sur fichiers envoyés, veuillez reessayer');
                    } 
                
            }else{
                    getLogInForm();
            }
        }
        
        elseif($_GET['action'] == 'getProjectToModify'){
            if(verifSession()){
                    
                    getProjectToModify();
                
            }else{
                    getLogInForm();
            }
        }
        
        elseif($_GET['action'] == 'modifyProject'){
            if(verifSession()){

                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $postId = $_GET['id'];
                    modifyProject($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de projet envoyé');
                }
            }
            else{
                getLogInForm();
            }           
        }
        
        elseif($_GET['action'] == 'updateProject'){
            
            if(verifSession()){
                
                $title = $_POST['project_title'];
                $shortDesc = $_POST['short_description'];
                $completeDesc = $_POST['complete_description'];
                $website = $_POST['website_link'];
                $skills = $_POST['skills'];
                $firstPic = $_FILES['first-picture'];
                $secondPic = $_FILES['second-picture'];
                $thirdPic = $_FILES['third-picture'];
                
                $id = $_GET['id'];
                
                if(generalVerification($title) AND generalVerification($shortDesc) AND generalVerification($completeDesc) AND generalVerification($website) AND generalVerification($skills) AND generalVerification($firstPic) AND generalVerification($secondPic) AND generalVerification($thirdPic)) {

                    if (isset($id) && $id > 0){
                        
                        if (verifPicture($firstPic) AND verifPicture($secondPic) AND verifPicture($thirdPic)) {

                            sendModifiedProject($title, $shortDesc, $completeDesc, $website, $skills, $id, $firstPic, $secondPic, $thirdPic);
                        }
                    } 
                } 
            }
            else{
                getLogInForm();
            } 
        }
        
        elseif($_GET['action'] == 'deleteProject'){
            if(verifSession()){
                if (isset($_GET['id']) && $_GET['id'] > 0) {

                    deleteProject($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            else{
                getLogInForm();
            } 
        }
        
        
    }
    else {
        listProjects();
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
    require('view/frontend/errorView.php');
    require('view/backend/errorView.php');
}