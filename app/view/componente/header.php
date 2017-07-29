<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Chart JS Graph Examples | Gentelella Alela! by Colorlib</title>

    <!-- Bootstrap -->
    <link href="<?= baseUrl("bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <link href="<?= baseUrl("assets/css/mystyle.css"); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?= baseUrl("bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?= baseUrl("bower_components/gentelella/vendors/nprogress/nprogress.css"); ?>" rel="stylesheet">

     <!-- jQuery custom content scroller -->
    <link href="<?= baseUrl("bower_components/gentelella/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css"); ?>" rel="stylesheet"/>
    <!-- Custom Theme Style -->
    <link href="<?= baseUrl("bower_components/gentelella/build/css/custom.min.css"); ?>" rel="stylesheet">
  
    <?php foreach ($arrayScript as $script): ?>
      <?php echo $script; ?>
    <?php endforeach; ?>
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo url("Home", "index")?>" class="site_title"><i class="fa fa-money"></i> <span>Financeiro</span></a>
            </div>

            <div class="clearfix"></div>
