<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nathalie Mota - Photographe Freelance</title>

    <?php wp_head(); // Ajoute | Scripts & Styles WordPress à l'en-tête ?>
</head>

<body>

<header id="main-header">
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
        <button id="close-menu-button" class="close-button">X</button>



        <nav class="header-menu">  
        <li class="accueil-menu"><a href="<?php echo home_url(); ?>">Accueil</a></li>
        <?php
        // Affiche le menu du header
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false,

            ]);?>
            <!--   Affiche le modal de contact-->
            <?php include get_template_directory() . '/template-parts/modale-contact.php'; ?>

        </nav>

        </header>
        
    