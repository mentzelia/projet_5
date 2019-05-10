<?php $title = 'Portfolio Virginie Duboscq - A propos';

ob_start(); 
?>

<section class="text-section">
                

    <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

    <p>Je vous décris mon parcours en quelques lignes.</p>


    <figure class="portrait">

        <div class="portrait-overlay"></div>

        <img src="public/images/apropos/photo.jpg" alt="portrait de Virginie Duboscq" />

    </figure>

</section>

<section class="about-section" >

    <div class="author-description">

        <p><span class="tabulation"></span>Après 7 ans en tant que docteur en pharmacie, je suis <span style="font-weight: bold">épuisée</span> du milieu médical.</p>

        <p><span class="tabulation"></span>Je tente une première reconversion professionnelle dans <span style="font-weight: bold">l'accompagnement émotionnel</span> des femmes qui subissent un burnout. Mais à nouveau, le <span style="font-weight: bold">poids</span> de l'accompagnement psychologique des patients me pèse.</p>

        <h2 class="quote">"Mon but est de mettre ma créativité et mes compétences à votre service"</h2>

        <p><span class="tabulation"></span>J'ai l'occasion d'entreprendre <span style="font-weight: bold">un voyage</span> de 7 mois en Polynésie française, où j'en profite pour me reformer à distance dans <span style="font-weight: bold">le web</span>. Mon but est de mettre ma <span style="font-weight: bold">créativité</span> et <span style="font-weight: bold">mes compétences</span> à votre service tout en alliant ma passion des voyages.</p>

    </div>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>








