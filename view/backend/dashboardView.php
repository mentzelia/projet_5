<?php $title = 'Portfolio Virginie Duboscq - Tableau de bord'; ?>

<?php ob_start(); ?>

<p class="back">
    <a href="index.php">Retour</a>
</p>
           
<section class="dashboard">
    
    <h2>Bienvenue sur votre tableau de bord!</h2><br />


    <div class="actions-backend">
        
        <h3>Que voulez-vous faire?</h3>
        
        <ul>
            
            <li><a href="index.php?action=createNewProject">Ajouter un projet</a><i class="fas fa-angle-double-right"></i></li>
            
            <li><a href="index.php?action=getProjectToModify">Modifier ou supprimer un projet</a><i class="fas fa-angle-double-right"></i></li>
            
        </ul>
    </div>

  
           
</section>

<?php $content = ob_get_clean(); ?>

<?php $connectText = "Retour tableau de bord"; ?>

<?php require('template.php'); ?>