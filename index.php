<?php
session_start();

require('controller/frontend.php');
require('controller/backend.php');

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
            if(isset($_POST['login']) && isset($_POST['password1']) && isset($_POST['password2']) && isset($_POST['email'])){
                if(!empty($_POST['login']) && !empty($_POST['password1']) && !empty($_POST['password2']) && !empty($_POST['email'])) {
                    
                    if($_POST['password1'] == $_POST['password2']) {
                        
                        addUser($_POST['login'], $_POST['password1'], $_POST['password1'], $_POST['email']);
 
                    }
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
            if(isset($_POST['login']) AND isset($_POST['password'])){
                
                if(!empty($_POST['login']) AND !empty($_POST['password'])){
                    
                    verifyUserData($_POST['login'], $_POST['password']);
                    
                }
            }
        }
        
        elseif($_GET['action'] == 'showDashboard'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){ 
                    
                    adminDashboard();
                } 
            }
        }
            
        elseif($_GET['action'] == 'log_out'){
            logOutSession();
        }
        
        elseif($_GET['action'] == 'createNewProject'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    getCreateProjectPage();
                }
            }else{
                    getLogInForm();
            }
        }
        
        elseif($_GET['action'] == 'sendProject'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    
                    if(isset($_POST['project_title']) AND isset($_POST['short_description']) AND isset($_POST['complete_description']) AND isset($_POST['website_link']) AND isset($_POST['skills'])){
                
                        if(!empty($_POST['project_title']) AND !empty($_POST['short_description']) AND !empty($_POST['complete_description']) AND !empty($_POST['website_link']) AND !empty($_POST['skills'])){
                            
                            if(isset($_FILES['first-picture']) AND isset($_FILES['second-picture']) AND isset($_FILES['third-picture'])) {
                                
                                if($_FILES['first-picture']['error'] == 0 AND $_FILES['second-picture']['error'] == 0 AND $_FILES['third-picture']['error'] == 0) {
                                    
                                    if($_FILES['first-picture']['size']<5242880 AND $_FILES['second-picture']['size']<5242880 AND $_FILES['third-picture']['size']<5242880) {
                                        
                                        $extension = substr(strrchr($_FILES['first-picture']['name'],'.'),1);
                                        
                                        if ($extension == 'png' OR $extension == 'jpg' OR $extension == 'jpeg') {
                                            
                                            $extension = substr(strrchr($_FILES['second-picture']['name'],'.'),1);
                                        
                                            if ($extension == 'png' OR $extension == 'jpg' OR $extension == 'jpeg') {
                                                
                                                $extension = substr(strrchr($_FILES['third-picture']['name'],'.'),1);
                                        
                                                if ($extension == 'png' OR $extension == 'jpg' OR $extension == 'jpeg') {
                            
                                                    sendProject($_POST['project_title'], $_POST['short_description'], $_POST['complete_description'], $_POST['website_link'], $_POST['skills'], $_FILES['first-picture'], $_FILES['second-picture'], $_FILES['third-picture']);
                                                } else { echo 'probleme extension image 3';} 
                                                
                                            } else { echo 'probleme extension image 2';}       
                                                                                
                                        } else { echo 'probleme extension image 1';}  
                                        
                                    } else { echo "erreur sur taille";}
                                    
                                } else {echo 'erreur firstPicture: '.$_FILES['first-picture']['error']. 'puis erreur 2ndPicture: '.$_FILES['second-picture']['error']. 'puis erreur 3rd Pictuer: '.$_FILES['third-picture']['error'];}
                                
                            } else {echo "pas de champ image";}
                        }
                    } 
                }
                
            }else{
                    getLogInForm();
            }
        }
        
        elseif($_GET['action'] == 'getProjectToModify'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    
                    getProjectToModify();
                }
            }else{
                    getLogInForm();
            }
        }
        
        elseif($_GET['action'] == 'modifyProject'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        $postId = $_GET['id'];
                        modifyProject($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de projet envoyé');
                    }
                }
            }
            else{
                getLogInForm();
            }           
        }
        
        elseif($_GET['action'] == 'updateProject'){
            
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    
                    if(isset($_POST['project_title']) AND isset($_POST['short_description']) AND isset($_POST['complete_description']) AND isset($_POST['website_link']) AND isset($_POST['skills'])){
                
                        if(!empty($_POST['project_title']) AND !empty($_POST['short_description']) AND !empty($_POST['complete_description']) AND !empty($_POST['website_link']) AND !empty($_POST['skills'])){
                            
                            if (isset($_GET['id']) && $_GET['id'] > 0){
                        
                                sendModifiedProject($_POST['project_title'], $_POST['short_description'], $_POST['complete_description'], $_POST['website_link'], $_POST['skills'], $_GET['id']);
                            } 
                        }
                    } 
                }
            }
            else{
                getLogInForm();
            } 
        }
        
        elseif($_GET['action'] == 'deleteProject'){
            if(isset($_SESSION['id']) AND isset($_SESSION['user'])){
                if(!empty($_SESSION['id']) AND !empty($_SESSION['user'])){
                    if (isset($_GET['id']) && $_GET['id'] > 0) {
                        
                        deleteProject($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
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