<?php $title = 'Portfolio Virginie Duboscq - Projet';

ob_start(); 
?>

            
            <section class="text-section">
                
                <article>
                        
                    <h2><span id="name">Virginie Duboscq</span><br/>Développeuse et intégratrice web</h2>
                    
                    <p class="online-link"><i class="fas fa-chalkboard-teacher"><a href="http://www.silessirenesexistent.com/projet_1/" target="_blank">Voir le projet en ligne</a></i></p>
                    
                </article>
                
            </section>
            
            <section class="project-section">
                
                <article>
                    
                    <h2>Projet 1: Intégration d'une maquette</h2>
                    
                    <div class="thumbnails">
                    
                        <img class="image" src="../../public/images/projects/project1/project1_1.png" alt="image de la premiere section du projet 1" />
                        
                        <img class="image" src="../../public/images/projects/project1/project1_2.png" alt="image de la deuxieme section du projet 1" />
                        
                    </div>
                    
                    <p>Une agence web m'a fourni la maquette qu'elle souhaitait pour la réalisation de son site web.</p>
                    <p>Le projet a consisté en l'intégration haute fidélité de cette maquette.</p>
                    <p class="skills"><span>Compétences nécessaires pour ce projet: </span>HTML5, CSS3.</p>
                
                </article>
            
            </section>
            
        <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>