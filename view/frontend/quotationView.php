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
    
    <form id="quotation-form" action="#">
        
        <h3>Type de projet</h3>
        <fieldset>
            <legend>Sélectionnez votre type de projet:*</legend>

            <input id="showcaseBasic" name="project_type" type="radio" required>
            <label for="showcaseBasic">Site vitrine</label>
            <br/>
            <input id="showcaseAppointment" name="project_type" type="radio" required>
            <label for="showcaseAppointment">Site avec réservation de rendez-vous en ligne</label>
            <br/>
            <input id="ecommerce" name="project_type" type="radio" required>
            <label for="ecommerce">Site de e-commerce</label>
            <p>(*) Obligatoire</p>
        </fieldset>
    
        <h3>Nombre de pages</h3>
        <fieldset>
            <legend>Sélectionnez le nombre de pages dont vous pensez avoir besoin:* </legend>

            <input id="max5" name="max_page" type="radio" required>
            <label for="max5">1 à 5 pages</label>
            <br/>
            <input id="max10" name="max_page" type="radio" required>
             <label for="max10">6 à 10 pages</label>
            <br/>
            <input id="max15" name="max_page" type="radio" required>
            <label for="max15">11 à 15 pages</label>
            <br/>
            <p>(*) Obligatoire</p>
        </fieldset>
 
        <h3>Vos coordonnées</h3>
        <fieldset>
            <legend>Veuillez renseigner vos coordonnées:*</legend>
            <label for="lastName">Nom </label>
            <input id="lastName" name="lastName" type="text" required>
            <br/>
            <label for="firstName">Prénom </label>
            <input id="firstName" name="firstName" type="text" required>
            <br/>
            <label for="email">Email </label>
            <input id="email" name="email" type="text" required>
            <br/>
            <p>(*) Obligatoire</p>
        </fieldset>
    
        <h3>Termes et conditions</h3>
        <fieldset>
            <p>Veuillez accepter les conditions de traitement des données*</p>
            <input id="acceptTerms" name="acceptTerms" type="checkbox" required> <label for="acceptTerms">En soumettant ce formulaire, j'accepte que les informations saisies soient utilisées uniquement dans le cadre de ma demande et de la relation commerciale éthique et personnalisée qui peut en découler.</label>
            <p>(*) Obligatoire</p>
        </fieldset>
 
    </form>
               
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


            
        