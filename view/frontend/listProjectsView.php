<?php $title = 'Portfolio Virginie Duboscq - Bienvenue';

ob_start(); 
?>
            
<aside class="text-section">

    <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

    <p>Retrouvez sur ce site toutes mes créations web.</p>

</aside>


<?php
while ($data = $projects->fetch())
{
?>


<article class="image-section">

    <div class="overlay-color"></div>

    <figure>

        <img class="image" src="<?= $data['src']; ?>" alt="image du projet d'une agence web" />

        <figcaption>
            
            <h2><span>Projet <?= $data['id'] ?>: </span><?= $data['project_title'] ?></h2>

            <p class="description"><?= $data['short_description'] ?></p>

            <a class="more-link" href="index.php?action=project&id=<?= $data['id'] ?>">Découvrir le projet</a>

        </figcaption>

    </figure>

</article>
    


<?php
}
$projects->closeCursor();
?>


            
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>