<?php $title = 'Portfolio Virginie Duboscq - Devis';

ob_start(); 
?>

<p class="back">
    <a href="index.php">Retour</a>
</p>

<section class="devis">
    
    <h2>Simuler votre devis en ligne</h2>
    
    <form id="quotation-form" action="#">
        
        <section>
        
            <h3>Quel est votre projet?</h3>

            <div>

                <label for="showcaseBasic">Site vitrine basique</label>
                <input id="showcaseBasic" name="showcaseBasic" type="radio" class="required">
                <label for="showcaseAppointment">Site vitrine avec réservation en ligne</label>
                <input id="showcaseAppointment" name="showcaseAppointment" type="radio" class="required">
                <label for="ecommerce">E-commerce</label>
                <input id="ecommerce" name="ecommerce" type="radio" class="required">
                <p>(*) Champs requis</p>

            </div>
        </section>
        
        <section>
        
            <h3>Nombre de pages souhaitées:</h3>

            <div>

                <label for="max5">0 - 5 pages</label>
                <input id="max5" name="max5" type="radio" class="required">
                <label for="max10">6 - 10 pages</label>
                <input id="max10" name="max10" type="radio" class="required">
                <label for="max15">11 - 15 pages</label>
                <input id="max15" name="max15" type="radio" class="required">
                <p>(*) Champs requis</p>

            </div>
            
        </section>
        
        <section>
        
            <h3>Vos coordonnées</h3>

            <div>

                <label for="name">Nom *</label>
                <input id="name" name="name" type="text" class="required">
                <label for="firstName">Prénom *</label>
                <input id="firstName" name="firstName" type="text" class="required">
                <label for="email">Email *</label>
                <input id="email" name="email" type="text" class="required email">
                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">J'accepte que mes données personnelles soient utilisées pour l'établissement de mon devis.</label>
                <p>(*) Champs requis</p>

            </div>
            
        </section>
        
        <section>
        
            <h3>Votre devis</h3>

            <div>

                <p>devis calculé s'affiche ici</p>

            </div>
            
        </section>

</form>
                
                
                
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


            
        