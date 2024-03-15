<!doctype html>
<html lang="<?php echo get_bloginfo("language"); ?>">
<head>
    <title><?php echo wp_get_document_title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper">
    <header class="header">
        <div class="container">
            <strong class="logo">
                <a href="#">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/src/img/logo.svg" width="240" alt="Logo">
                </a>
            </strong>
            <nav class="navbar">
                <a href="#" class="nav-opener"><span></span></a>
                <ul class="navbar__nav">
                    <li><a href="#">Home</a></li>
                    <li>
                        <a href="#">About</a>
                        <ul class="sub-menu">
                            <li><a href="#">Link 1</a></li>
                            <li><a href="#">Link 2</a></li>
                            <li><a href="#">Link 3</a></li>
                            <li><a href="#">Link 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <a href="#" class="search-opener"><i class="icon-search"></i></a>
            </nav>
        </div>
        <div class="header__search">
            <div class="container">
                <form action="#">
                    <input type="search" id="header-search" placeholder="Type your search here">
                    <button type="submit"><i class="icon-search"></i></button>
                </form>
            </div>
        </div>
    </header>
