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
    
    $mailTo = 'vi.duboscq@gmail.com';
    $message_txt = "Voici le message de: ".$name. " " .$email. " : " .$message;
    $message_html = "<html><head></head><body><b>Voici le message de $name ($email): $message </body></html>";
    $subject = "Vous avez eu un message depuis votre formulaire de contact";
    
    mailing($mailTo, $message_text, $message_html, $subject );
    
}

function mailing($mailTo, $message_text, $message_html, $subject )
{
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mailTo)) // bug verification
    {
        $break_line = "\r\n";
    }
    else
    {
        $break_line = "\n";
    }
    
    //Boundary
    $boundary = "-----=".md5(rand());
    $boundary_alt = "-----=".md5(rand());
  
    $header = "From: \"Caducée Créations\"<contact@caduceecreations.com>".$break_line;
    $header.= "Reply-to: \"Caducée Créations\" <contact@caduceecreations.com>".$break_line;
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
    
 
   
    mail($mailTo,$subject,$message,$header);

 
    header('Location:index.php?action=listProjects');
}


function sendQuotation($radioButtonSelected1, $radioButtonSelected2, $lastName, $firstName, $email, $checkboxSelected)
{
    $lastName = htmlspecialchars($lastName);
    $firstName = htmlspecialchars($firstName);
    $email = htmlspecialchars($email);
    
    
    //Send me an email
    $mailTo = 'vi.duboscq@gmail.com';
    $message = "Type de projet: " .$radioButtonSelected1. " - Nombre de pages max: " .$radioButtonSelected2. " - Termes acceptés: " .$checkboxSelected;
    
    $message_txt = "Voici la demande de devis de: ".$lastName. " " .$firstName. " " .$email. " : " .$message;
    $message_html = "<html><head></head><body><b>Voici la demande de devis de $lastName $firstName ($email): $message </body></html>";
    $subject = "Vous avez eu une demande de devis";
    
    mailing($mailTo, $message_text, $message_html, $subject );
    
    
    //Send email to prospect
    $mailTo = $email;
    
    $message_txt = "Votre demande de devis a bien été envoyée et va être traitée sous 48h (jours ouvrés). Merci de votre confiance";
    $message_html = "<html><head></head><body><b>Votre demande de devis a bien ëté envoyée et va être traitée sous 48h (jours ouvrés). Merci de votre confiance.</body></html>";
    $subject = $firstName. ": vous recevrez votre devis sous 48 heures";
    
    mailing($mailTo, $message_text, $message_html, $subject );
    
   
}

function errorQuotation() {
    require('view/frontend/errorQuotationView.php');
}