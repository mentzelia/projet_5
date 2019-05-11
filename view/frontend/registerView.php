<?php $title = 'Portfolio Virginie Duboscq - Connexion';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<section class="register-form">

    <h2>Inscription</h2>
        
<form method="post" action="index.php?action=user_registration">
    
        <label for="login">Nom d'utilisateur:</label>
        <input type="text" name="login" value="" id="login" /><br/>


        <label for="password1">Mot de passe:</label>
        <input type="password" name="password1" value="" id="password1" /><br/>

        <label for="password2">Retapez le mot de passe:</label>
        <input type="password" name="password2" value="" id="password2" /><br/>
    
        <label for="email">Adresse email:</label>
        <input type="email" name="email" value="" id="email" /><br/>
  
        <input class="formButton" type="submit" value="S'inscrire" /><br/>
</form>
           
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>