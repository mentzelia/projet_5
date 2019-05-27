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
    
    <form id="quotation-form" action= ''>
        <div>

            <h3>Type de projet</h3>
            <fieldset>
                <p>Sélectionnez votre type de projet:*</p>
                <input id="showcaseBasic" name="showcaseBasic" type="radio" required>
                <label for="showcaseBasic">Site vitrine</label>
                <input id="showcaseAppointment" name="showcaseAppointment" type="radio" required>
                <label for="showcaseAppointment">Site avec réservation de rendez-vous en ligne</label>
                <input id="ecommerce" name="ecommerce" type="radio" required>
                <label for="ecommerce">Site de e-commerce</label>

                <p>(*) Obligatoire</p>
            </fieldset>


            <h3>Nombre de pages</h3>
            <fieldset>
                <p>Sélectionnez le nombre de pages dont vous pensez avoir besoin:* </p>
                <input id="max5" name="max5" type="radio" required>
                <label for="max5">1 à 5 pages</label>
                <br/>
                <input id="max10" name="max10" type="radio" required>
                 <label for="max10">6 à 10 pages</label>
                <br/>
                <input id="max15" name="max15" type="radio" required>
                <label for="max15">11 à 15 pages</label>
                <br/>
                <p>(*) Obligatoire</p>
            </fieldset>


            <h3>Vos coordonnées</h3>
            <fieldset>
                <p>Veuillez renseigner vos coordonnées:*</p>
                <label for="firstName">Prénom </label>
                <input id="firstName" name="firstName" type="text" required>
                <br/>
                <label for="lastName">Nom </label>
                <input id="lastName" name="lastName" type="text" required>
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

            <h3>Votre devis</h3>
            <fieldset>
                <p>Merci pour votre confiance. Vous recevrez votre devis par mail d'ici 48 heures (jours ouvrés). Pensez à vérifier votre courrier indésirable.</p>
            </fieldset>
        </div>
    </form>
               
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>


            
        