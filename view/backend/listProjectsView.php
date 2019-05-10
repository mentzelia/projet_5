<?php $title = 'Portfolio Virginie Duboscq  - Liste des billets'; ?>

<?php ob_start(); ?>

<h2>Quel projet souhaitez-vous modifier?</h2><br />

<?php
while ($data = $projects->fetch())
{
?>
    <div class="editActions">
        <p>
            "Projet <?= $data['id'] ?>: <?= $data['project_title'] ?>" publié le  <?= $data['creation_date_fr'] ?>
            
            <a href="index.php?action=modifyProject&id=<?= $data['id'] ?>"><i class="fas fa-edit"></i></a>
            
            
            <a href="index.php?action=deleteProject&id=<?= $data['id'] ?>"><i class="fas fa-trash-alt"></i></a>
        </p>
    </div>
<?php
}
$projects->closeCursor();
?>

<p class="return">
    <a href="index.php?action=showDashboard">Retour</a>
</p>

     


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>