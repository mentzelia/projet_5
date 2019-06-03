<?php

require_once('model/ProjectManager.php');
require_once('model/PictureManager.php');
require_once('model/UserManager.php');

function listProjects()
{
    $currentPage = 'listProjects';
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager(); 
    
    $projects = $projectManager->getProjects(); 

    require('view/frontend/listProjectsView.php');
}

function project($projectId)
{
    $projectManager = new OpenClassRooms\Duboscq\Virginie\ProjectManager();
    $pictureManager = new OpenClassRooms\Duboscq\Virginie\PictureManager();

    $project = $projectManager->getProject($projectId);
    $pictures = $pictureManager->getPictures($projectId);
    
    $currentPage = 'project';

    require('view/frontend/projectView.php');
}

function about()
{
    $currentPage = 'about';
    require('view/frontend/aboutView.php');
}

function contact()
{
    $currentPage = 'contact';
    require('view/frontend/contactView.php');
}

function quotation()
{
    $currentPage = 'quotation';
    require('view/frontend/quotationView.php');
}

function GetRegisterForm()
{
    $currentPage = 'register';
    require('view/frontend/registerView.php');
}

function addUser($login, $password1, $email)
{
    $userManager = new OpenClassRooms\Duboscq\Virginie\UserManager();
    
    $login = htmlspecialchars($login);
    $password1 = htmlspecialchars($password1);
    $email = htmlspecialchars($email);
    $result = $userManager->addUser($login, $password1, $email);
    
    header('Location:index.php?action=log_in');
               
}

function getLogInForm()
{
    $currentPage = 'log_in';
    require('view/frontend/loginView.php');
}

function verifyUserData($login, $password)
{
    $userManager = new OpenClassRooms\Duboscq\Virginie\UserManager();
    
    $data = $userManager->getUserData($login);
    
    $passwordOK = password_verify($password, $data['password']);
    
    if($login == $data['user'] AND $passwordOK){
        if($data['role'] == 1){
            session_start();
            $_SESSION['id']= $data['id'];
            $_SESSION['user']= $data['user'];
            
            header('Location:index.php?action=showDashboard');
            
        }else{
            echo 'Vous n\'êtes pas administrateur.';
        }
    }else{
        echo 'Mauvais identifiant ou mot de passe<br /><a href="index.php?action=log_in">Retour</a>'; 
    } 
}

function sendMail($name, $email, $message)
{
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $message = htmlspecialchars($message);
    
    $mailDest = 'vi.duboscq@gmail.com';
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailDest)) // bug verification
    {
        $break_line = "\r\n";
    }
    else
    {
        $break_line = "\n";
    }
    
    //HTML and text formats
    $message_txt = "Voici le message de: ".$name. " " .$email. " : " .$message;
    $message_html = "<html><head></head><body><b>Voici le message de $name ($email): $message </body></html>";

    //Boundary
    $boundary = "-----=".md5(rand());
    $boundary_alt = "-----=".md5(rand());

 
    $subject = "Vous avez eu un message depuis votre formulaire de contact";
  
    $header = "From: \"Portfolio Formulaire de contact\"<contact@caduceecreations.com>".$break_line;
    $header.= "Reply-to: \"Portfolio\" <contact@caduceecreations.com>".$break_line;
    $header.= "MIME-Version: 1.0".$break_line;
    $header.= "Content-Type: multipart/mixed;".$break_line." boundary=\"$boundary\"".$break_line;
    
    //Message
    $message = $break_line."--".$boundary.$break_line;
    $message.= "Content-Type: multipart/alternative;".$break_line." boundary=\"$boundary_alt\"".$break_line;
    $message.= $break_line."--".$boundary_alt.$break_line;
    //text format
    $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$break_line;
    $message.= "Content-Transfer-Encoding: 8bit".$break_line;
    $message.= $break_line.$message_txt.$break_line;
    

    $message.= $break_line."--".$boundary_alt.$break_line;

    //html format
    $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$break_line;
    $message.= "Content-Transfer-Encoding: 8bit".$break_line;
    $message.= $break_line.$message_html.$break_line;
   
    $message.= $break_line."--".$boundary_alt."--".$break_line;
    
 
   
    mail($mailDest,$subject,$message,$header);

 
    header('Location:index.php?action=listProjects');
    
}



function sendQuotation($radioButtonSelected1, $radioButtonSelected2, $lastName, $firstName, $email, $checkboxSelected)
{
    $lastName = htmlspecialchars($lastName);
    $firstName = htmlspecialchars($firstName);
    $email = htmlspecialchars($email);
    
    $to = "vi.duboscq@gmail.com";
    $object = "Vous avez eu une demande de devis depuis la simulation en ligne";
    $headers = "From: " . $lastName . " " . $firstName . "send by: " . $email;
    $message = "Demande de devis avec les informations suivantes: Coordonnées: " . $lastName . " " . $firstName . " " . $email . 
    " Infos: " . $radioButtonSelected1 . " " . $radioButtonSelected2 .
    " Acceptation des termes: " . $checkboxSelected;
    
    if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email))
        
    {
        mail($to, $object, $message, $headers);
        
    }
    
        header('Location:index.php?action=listProjects');
    
    
   // echo($radioButtonSelected1.$radioButtonSelected2.$lastName.$firstName.$email.$checkboxSelected);
   
}