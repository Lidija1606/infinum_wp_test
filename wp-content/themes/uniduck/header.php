<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>

    <?php wp_head(); ?>
  </head>
  <body>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="/">
                        <img src="<?php bloginfo('template_url'); ?>/Assets/Images/logo.png" alt="Uniduck | The Unicorn & a Duck Logo" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link get-app-btn button" href="#">Get for iOS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link login-btn button" href="#">Unicorn Owners</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>

        <main>