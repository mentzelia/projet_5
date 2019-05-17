<?php 

$meta = 'Simulez votre devis directement en ligne.';
$title = 'Portfolio Virginie Duboscq - Devis';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<section class="devis">
    
    <h2>Simuler votre devis en ligne</h2>
    
    <div id="quotation-form">
        
        <h3>Type de projet</h3>
            <section>
                <p>Sélectionnez votre type de projet:</p>
        </section>
        
        <h3>Nombre de pages</h3>
            <section>
                <p>Sélectionnez le nombre de pages dont vous pensez avoir besoin: </p>
            </section>
        
        <h3>Vos coordonnées</h3>
            <section>
                <p>Veuillez renseigner vos coordonnées:</p>
        </section>
        
        <h3>Termes et conditions</h3>
            <section>
                <p>Veuillez accepter les conditions de traitement des données</p>
            </section>
        
        <h3>Votre devis</h3>
            <section>
                <p>Voici la simulation de votre devis (sous réserve de modification ultérieure):</p>
            </section>
        
        
    </div>
        
        
        


                
                
                
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


            
        