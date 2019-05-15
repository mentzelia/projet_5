<?php 

$meta = 'Page de connexion';
$title = 'Portfolio Virginie Duboscq - Connexion';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<section class="login-form">
    
    <h2>Connexion</h2>

    <form method="post" action="index.php?action=admin_connexion">
    <label for="login">Nom d'utilisateur:</label>
    <input type="text" name="login" value="" id="login" /><br />

    <label for="password">Mot de passe:</label>
    <input type="password" name="password" value="" id="password" /><br />

    <input class="formButton" type="submit" value="Se connecter" />
    </form>
           
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
            
        