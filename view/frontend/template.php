<!DOCTYPE HTML>

 <html lang="fr">

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta charset="utf-8">
        <meta name="description" content="Page de biographie de Virginie Duboscq, développeuse et intégratrice web.">
        <meta name="author" content="Virginie DUBOSCQ">
        

        <title><?= $title ?></title>
        
        <link rel="icon" href="public/images/favicon.ico" type="image/x-icon">
        <link href="public/css/normalize.css" rel="stylesheet" type="text/css">
        <link href="public/css/style.css" rel="stylesheet" type="text/css">
        <link href="public/css/responsive.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        
    </head>
    
    <body>
        
        <header>
                
            <h1>

                <a href="listProjectsView.php"><img class="logo" src="public/images/logo.png" title="logo Virginie Duboscq" alt="logo Virginie Duboscq"/></a>

            </h1>

            <nav class="header-nav">

                <ul>

                    <li><a href="view/frontend/listProjectsView.php">Portfolio</a></li>

                    <li class="nav-active"><a href="view/frontend/aboutView.php">A Propos</a></li>
                    
                    <li><a href="view/frontend/quotationView.php">Devis en ligne</a></li>

                    <li><a href="view/frontend/contactView.php">Contact</a></li>

                </ul>

            </nav>
         
        </header>
        
        <main>
        
            <?= $content ?>
        
        </main>
        
        <footer>

                 <h1>

                     <a href="view/frontend/listProjectsView.php"><img class="logo" src="public/images/logo.png" title="logo Virginie Duboscq" alt="logo Virginie Duboscq"/></a>

                 </h1>

                 <nav class="footer-nav">

                     <ul>

                        <li><a href="view/frontend/listProjectsView.php">Portfolio</a></li>

                        <li class="nav-active"><a href="view/frontend/aboutView.php">A Propos</a></li>

                        <li><a href="view/frontend/quotationView.php">Devis en ligne</a></li>

                        <li><a href="view/frontend/contactView.php">Contact</a></li>

                        <li><a href="view/frontend/loginView.php">Se connecter</a></li>

                    </ul>

                 </nav>

                 <ul class="social-icons">

                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>

                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>

                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>

                </ul>

                <p class="copy-right">&copy; 2019  Virginie Duboscq - Tous droits réservés</p>

             </footer>

         </body>

    </html>