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