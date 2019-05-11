<?php $title = 'Portfolio de Virginie Duboscq- Gestion des erreurs';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<h1>Gestion des erreurs</h1>

<p>
<?= 'Erreur : ' . $e->getMessage();
?>
</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>