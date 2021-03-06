<?php 

$meta = 'Page des projets réalisés.';
$title = 'Portfolio Virginie Duboscq - '. $project['project_title']; ?>

<?php ob_start(); ?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<aside class="text-section">

        <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

        <p class="online-link">
            <i class="fas fa-chalkboard-teacher">
                <a href="<?= $project['website_link'] ?>" target="_blank">Voir le projet en ligne</a>
            </i>
        </p>

</aside>

<section class="project-section">

        <h2>Projet <?= $project['id'] ?>: <?= $project['project_title'] ?></h2>


        <div class="thumbnails">
            
            <?php
            while ($data = $pictures->fetch())
            {
            ?>

                        <img class="image" alt="images du projet" src="public/uploads/<?= $data['src']; ?>" />


            <?php
            }

            $pictures->closeCursor();
            ?>


        </div>

    
        <?= nl2br($project['complete_description']) ?>
        
        
        <p class="skills">
            <span>Compétences nécessaires pour ce projet: </span>
            <?= $project['skills'] ?>.
        </p>


</section>

            
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>