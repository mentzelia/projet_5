<?php $title = 'Portfolio Virginie Duboscq - Projet';

ob_start(); 
?>

            
<section class="text-section">

    <article>

        <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

        <p class="online-link"><i class="fas fa-chalkboard-teacher"><a href="<?= $data['website_link'] ?>" target="_blank">Voir le projet en ligne</a></i></p>

    </article>

</section>

<section class="project-section">

    <article>

        <h2>Projet 1: Intégration d'une maquette</h2>

        <div class="thumbnails">

            <img class="image" src="../../public/images/projects/project1/project1_1.png" alt="image de la premiere section du projet 1" />

            <img class="image" src="../../public/images/projects/project1/project1_2.png" alt="image de la deuxieme section du projet 1" />

        </div>

        <p>
            <?= nl2br($data['complete_description']) ?>
        </p>
        
        <p class="skills"><span>Compétences nécessaires pour ce projet: </span><?= $data['skills'] ?>.</p>

    </article>

</section>
            
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>