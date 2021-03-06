<!DOCTYPE html>
<html>
    
    <head>
        
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta charset="utf-8">
        <meta name="author" content="Virginie DUBOSCQ">
        
        <title>Portfolio Virginie Duboscq - Nouveau projet</title>
        
        <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
        <link href="public/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="public/css/style.css" rel="stylesheet" type="text/css">
        <link href="public/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea' });</script>
        
    </head>
    
    <body>
        
        <p class="back">
            <a href="index.php?action=showDashboard">Retour</a>
        </p>
        
        <section class="new-project">
            
            <h2>Ajouter un nouveau projet</h2>

            <form class="project-form" method="post" action="index.php?action=sendProject" enctype="multipart/form-data">
                
                <label for="project_title">Titre du projet:</label>
                <input class="new-project-input" type= "text" name="project_title" value="" />

                <label for="website_link">Lien du site:</label>
                <input class="new-project-input" type= "text" name="website_link" value="" />

                <label for="skills">Compétences:</label>
                <input class="new-project-input" type= "text" name="skills" value="" />

                <label for="short_description">Description de présentation:</label>
                <input class="new-project-input" type= "text" name="short_description" value="" />
                
                <label for="complete_description">Description complète:</label>
                <textarea name="complete_description"></textarea>
                
                
                <!-- envoi des images -->
                <label for="first-picture">Image principale (JPG, JPEG ou PNG | max. 5 Mo) :</label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                <input type="file" name="first-picture" id="first-picture" /><br />
                
                <label for="second-picture">Deuxième image (JPG, JPEG ou PNG | max. 5 Mo) :</label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                <input type="file" name="second-picture" id="second-picture" /><br />
                
                <label for="third-picture">Troisième image (JPG, JPEG ou PNG | max. 5 Mo) :</label><br />
                <input type="hidden" name="MAX_FILE_SIZE" value="5242880" />
                <input type="file" name="third-picture" id="third-picture" /><br />
                
                

                <input class="project-form-button" type="submit" value="Ajouter" />
                
            </form>
            
        </section> 

    </body>
    
</html>