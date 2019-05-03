<?php $title = 'Portfolio Virginie Duboscq - Bienvenue';

ob_start(); 
?>
            
<section class="text-section">

    <article>

        <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

        <p>Retrouvez sur ce site toutes mes créations web.</p>

    </article>

</section>


<section class="image-section">

    <div class="overlay-color"></div>

    <figure>

        <img class="image" src="../../public/images/home-images/image1.png" alt="image du projet d'une agence web" />

        <figcaption>

            <h2><span>Projet 1: </span>Agence web</h2>

            <p class="description">Intégration d'une maquette en HTML5 et CSS3.</p>

            <a class="more-link" href="projet.php">Découvrir le projet</a>

        </figcaption>

    </figure>

</section>


<section class="image-section" id="image-section-2">

    <figure>

        <div class="overlay-color"></div>

        <img class="image" src="../../public/images/home-images/image2.png" alt="image du projet de l'office du tourisme de Strasbourg" />

        <figcaption>

            <h2><span>Projet 2: </span>Office du tourisme</h2>

            <p class="description">Création d'un site avec Wordpress.</p>

            <a class="more-link" href="projet.php">Découvrir le projet</a>

        </figcaption>

    </figure>

</section>


<section class="image-section" id="image-section-3">

    <figure>

        <div class="overlay-color"></div>

        <img class="image" src="../../public/images/home-images/image3.png" alt="image du projet d'un site de location de vélos" />

        <figcaption>

            <h2><span>Projet 3: </span>Carte interactive</h2>

            <p class="description">Réservation d'un vélo en ligne grâce à javasript.</p>

            <a class="more-link" href="projet.php">Découvrir le projet</a>

        </figcaption>

    </figure>

</section>


<section class="image-section" id="image-section-4">

    <figure>

        <div class="overlay-color"></div>

        <img class="image" src="../../public/images/home-images/image4.png" alt="image du projet de blog d'un écrivain" />

        <figcaption>

            <h2><span>Projet 4: </span>Blog d'un écrivain</h2>

            <p class="description">Création d'un blog avec espace administrateur.</p>

            <a class="more-link" href="projet.php">Découvrir le projet</a>

        </figcaption>

    </figure>

</section>
            
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>