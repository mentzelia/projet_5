<!DOCTYPE html>
<html>
<head>
    <title>Portfolio Virginie Duboscq  - Modifier un projet</title>
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
    <h2>Modifier un projet</h2>
    
    <form method="post" action="index.php?action=updateProject&id=<?= $projectId ?>">
        
        <label for="project_title">Titre du projet:</label>
        <input type= "text" name="project_title" value="<?= $project['project_title'] ?>" />
        <br />

        
        <label for="website_link">Lien du site:</label>
        <input type= "text" name="website_link" value="<?= $project['website_link'] ?>" />
        <br />

        <label for="skills">Compétences:</label>
        <input type= "text" name="skills" value="<?= $project['skills'] ?>" />
        <br />
        
        <label for="short_description">Description de présentation:</label>
        <input type= "text" name="short_description" value="<?= $project['short_description'] ?>" />
        <br />
        
        <textarea name="complete_description"><?= $project['complete_description'] ?></textarea>
        
        <input type="submit" value="Modifier" />
        
    </form>
    
    <p>
        <a href="index.php?action=showDashboard">Retour</a>
    </p>
   
</body>
</html>