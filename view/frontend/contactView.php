<?php $title = 'Portfolio Virginie Duboscq - Contact';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<aside class="text-section">

        <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>

        <p>Contactez-moi pour toute question. Vous pouvez également simuler votre devis directement en ligne.</p>

        <p><span style="font-weight:bold"><i class="fa fa-phone"></i> +33(0)6 33 33 33 00</span></p>
        <p><span style="font-weight:bold"><a href="mailto:contact@caduceecreations.com"><i class="fa fa-envelope"></i> contact@caduceecreations.com</a></span></p>

        <p class="button"><a href="index.php?action=quotation">Simuler un devis en ligne</a></p>


</aside>

<div id="map">

    

</div>

<div class="contact-form">

        <form method="post" action="" name="cform" id="cform">

            <h2 id="form-title">Une question? Contactez-moi!</h2>

            <input  name="name" id="input-name" type="text" placeholder="Renseignez votre nom" required>

            <input  name="email" id="input-email" type="email"  placeholder="Renseignez votre email" required>

            <textarea name="comments" id="input-comments" cols="5" rows="5" placeholder="Ecrivez votre message ici" required></textarea>

            <input id="send-button" name="send-button" type="submit" value="Envoyer">



        </form>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
            
        