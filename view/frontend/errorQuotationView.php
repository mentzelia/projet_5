<?php 

$meta = 'Simulez votre devis directement en ligne.';
$title = 'Portfolio Virginie Duboscq - Devis';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour accueil</a>
</p>

<p>Les données renseignées ont été mal saisies ou manquantes. Elles n'ont pas pu être envoyées.
<a href="index.php?action=quotation" style="text-decoration:underline">Veuillez refaire la simulation en cliquant ici.</a>
</p>
    
    
   

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


   