<?php $title = 'Portfolio Virginie Duboscq - Tableau de bord';

ob_start(); 
?>

           
<section class="dashboard">
    
    <h2>Bienvenue sur votre tableau de bord!</h2><br />


    <div class="actions">
        
        <h3>Que voulez-vous faire?</h3>
        
        <ul>
            
            <li><a href="index.php?action=newProject">Ajouter un projet</a></li>
            
            <li><a href="index.php?action=getProjectToModify">Modifier ou supprimer un projet</a></li>
            
            <li><a href="#">Voir les devis</a></li>
        </ul>
    </div>

  
           
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>