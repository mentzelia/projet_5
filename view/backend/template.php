<!DOCTYPE HTML>

 <html lang="fr">

    <head>

    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta charset="utf-8">
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

                <a href="index.php"><img class="logoHeader" src="public/images/logo.png" title="logo Virginie Duboscq" alt="logo Virginie Duboscq"/></a>

            </h1>

            <nav class="header-nav">

                <ul>

                    <li>
                        <a href="index.php">Portfolio</a>
                    </li>

                    <li>
                        <a href="index.php?action=about">A Propos</a>
                    </li>
                    
                    <li>
                        <a href="index.php?action=quotation">Devis en ligne</a>
                    </li>

                    <li>
                        <a href="index.php?action=contact">Contact</a>
                    </li>

                </ul>

            </nav>
         
        </header>
        
        <main>
        
            <?= $content ?>
            
        </main>
         
        <footer>

                 <h1>

                     <a href="index.php"><img class="logoFooter" src="public/images/logo.png" title="logo Virginie Duboscq" alt="logo Virginie Duboscq"/></a>

                 </h1>

                 <nav class="footer-nav">

                     <ul>

                        <li><a href="index.php">Portfolio</a></li>

                        <li><a href="index.php?action=about">A Propos</a></li>

                        <li><a href="index.php?action=quotation">Devis en ligne</a></li>

                        <li><a href="index.php?action=contact">Contact</a></li>
                        
                        <li>
                            <a href="index.php?action=register">Créer un compte</a>
                        </li>
                         
                        <li>
                            <a href="index.php?action=log_in">Se connecter</a>
                        </li>

                        <li><a href="index.php?action=log_out">Se déconnecter</a></li>

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