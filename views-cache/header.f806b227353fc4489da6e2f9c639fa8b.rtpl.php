<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
      <link rel="stylesheet" href="/assets/css/main.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Mx Diary</title>
    </head>

    <body>
        <div class="navbar-fixed">
            <nav class="blue-grey">
                <div class="container">
                    <div class="nav-wrapper">
                        <a href="/" class="brand-logo">Mx Diary</a>
                        <a href="" data-target="mobile-nav" class="sidenav-trigger">
                            <i class="material-icons">menu</i>
                        </a>

                        <!-- Esconde o menu quando a tela é medium ou lower-->
                        <ul class="right hide-on-med-and-down">
                            <li>
                                <a href="/login">Login</a>
                            </li>

                            <?php if( checkLogin() ){ ?>
                            <li>
                                <a href="/dashboard">Dashboard</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <ul class="sidenav" id="mobile-nav"> <!-- o ID dessa ul deve ser igual ao data-target que está na tag com a classe sidenav-trigger -->
                <li>
                    <a href="/">Home</a>
                </li>
                <li>
                    <a href="/login">Login</a>
                </li>

                <li>
                    <a href="/dashboard">Dashboard</a>
                </li>
            </ul>