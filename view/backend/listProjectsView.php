<?php $title = 'Portfolio Virginie Duboscq  - Liste des projets'; ?>

<?php ob_start(); ?>

<p class="back">
    <a href="index.php?action=showDashboard">Retour</a>
</p>

<h2>Quel projet souhaitez-vous modifier?</h2><br />

<?php
while ($data = $projects->fetch())
{
?>

    <div class="edit-actions">
        
        <p>
            "Projet <?= $data['id'] ?>: <?= $data['project_title'] ?>" publié le  <?= $data['creation_date_fr'] ?>
        </p>
        
        <div class="edit-icons">
            
            <a href="index.php?action=modifyProject&id=<?= $data['id'] ?>">
                <i class="fas fa-edit"></i>
            </a>


            <a href="index.php?action=deleteProject&id=<?= $data['id'] ?>">
                <i class="fas fa-trash-alt"></i>
            </a>
            
         </div>
        
        <div class="spacer"></div>
        
    </div>

<?php
}
$projects->closeCursor();
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>