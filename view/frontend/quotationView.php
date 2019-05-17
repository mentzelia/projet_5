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
                <h4>Sélectionnez votre type de projet:</h4>
                <div class="input-section">
                    <input id="showcaseBasic" name="showcaseBasic" type="radio" class="required">
                    <label for="showcaseBasic">Site vitrine</label>
                </div>

                <div class="input-section">
                    <input id="showcaseAppointment" name="showcaseAppointment" type="radio" class="required">
                    <label for="showcaseAppointment">Site avec réservation de rendez-vous en ligne</label>
                </div>

                <div class="input-section">
                    <input id="ecommerce" name="ecommerce" type="radio" class="required">
                    <label for="ecommerce">Site de e-commerce</label>
                </div>
                
                <p>(*) Champs requis</p>
        </section>
        
        <h3>Nombre de pages</h3>
            <section>
                <h4>Sélectionnez le nombre de pages dont vous pensez avoir besoin: </h4>
                
                
                <div class="input-section">
                <input id="max5" name="max5" type="radio" class="required">
                <label for="max5">1 à 5 pages</label>
                </div>
                
                <div class="input-section">
                    <input id="max10" name="max10" type="radio" class="required">
                    <label for="max10">6 à 10 pages</label>
                </div>
                
                <div class="input-section">
                    <input id="max15" name="max15" type="radio" class="required">
                    <label for="max15">11 à 15 pages</label>
                </div>
                
                <p>(*) Champs requis</p>
            </section>
        
        <h3>Vos coordonnées</h3>
            <section>
                <h4>Veuillez renseigner vos coordonnées:</h4>
                
                <div class="input-section">
                    <label for="firstName">Prénom *</label>
                    <input id="firstName" name="firstName" type="text" class="required">
                </div>
                
                <div class="input-section">
                    <label for="lastName">Nom *</label>
                    <input id="lastName" name="lastName" type="text" class="required">
                </div>
                
                <div class="input-section">
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="text" class="required email">
                </div>
                
                <p>(*) Champs requis</p>
        </section>
        
        <h3>Termes et conditions</h3>
            <section>
                <h4>Veuillez accepter les conditions de traitement des données</h4>
                
                <div class="input-section">
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées uniquement dans le cadre de ma demande et de la relation commerciale éthique et personnalisée qui peut en découler.</label>
                </div>
            </section>
        
        <h3>Votre devis</h3>
            <section>
                <h4>Voici la simulation de votre devis (sous réserve de modification ultérieure):</h4>
                <p>Le devis calculé s'affiche ici</p>
            </section>
        
    </div>
               
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


            
        