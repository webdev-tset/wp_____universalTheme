<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafikart tuto</title>
    <?php wp_head();echo"yo";?>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary mb-4">
        <a class="navbar-brand" href="<?php esc_url(home_url("/")); ?>"><?php bloginfo('name'); ?>
            <?= get_theme_mod('header_background'); ?>
        </a>
        <?php wp_nav_menu(['theme_location' => 'header', 'container' => false, 'menu_class' => 'navbar-nav mr-auto']); ?>
<?php

// var_dump(get_home_url());
// print_r(get_home_url());
// die();
?>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <!--ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul-->
            <?php get_search_form() ?>
        </div>
    </nav>
    <div id="main" class="container">