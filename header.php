<!-- Fichier PHP pour le header du site -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nathalie Mota - Photographe Freelance</title>
    <?php wp_head(); // OBLIGATOIRE : Injecte Scripts & Styles WordPress à l'en-tête et active les fonctionnalités de WP ?>
</head>
<body>
<header id="main-header">
        <!--Partie logo-->
        <div class="header-logo">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a href="<?php echo home_url(); ?>">
                <img class="logo-dimension" src="<?php echo $logo[0] ?>" alt="Logo">
            </a>
        </div>
        <!-- Bouton | Menu Mobile -->
        <div class="mobile-menu-button" id="open-menu-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        <!--Partie navigation-->
        <nav class="header-menu">  
        <!--Header mobile-->
        <div class="mobile-header">
            <div class="mobile-logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo $logo[0]; ?>" alt="Logo" />
                </a>
            </div>
            <button id="close-menu-button-mobile" class="close-button">X</button>
        </div>
        <!--Menu en tête-->
        <ul>
        <li class="accueil-menu"><a href="<?php echo home_url(); ?>">Accueil</a></li>
        <?php
        // Affiche le menu du header
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false,
            ]);?>
            <!--   Affiche le modal de contact-->
            <button id="contact-button-header">Contact</button>   
        </ul>
        </nav>
        </header>
        
    