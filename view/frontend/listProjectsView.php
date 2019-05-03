<?php $title = 'Portfolio Virginie Duboscq - Bienvenue';

ob_start(); 
?>
            
<section class="text-section">

    <article>

        <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

        <p>Retrouvez sur ce site toutes mes créations web.</p>

    </article>

</section>



<?php
while ($data = $projects->fetch())
{
?>

<section class="image-section">

    <div class="overlay-color"></div>

    <figure>

        <img class="image" src="public/images/home-images/image1.png" alt="image du projet d'une agence web" />

        <figcaption>

            <h2><span>Projet <?= $data['id'] ?>: </span><?= $data['project_title'] ?></h2>

            <p class="description"><?= $data['short_description'] ?></p>

            <a class="more-link" href="projet.php">Découvrir le projet</a>

        </figcaption>

    </figure>

</section>

<?php
}
$projects->closeCursor();
?>


            
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>