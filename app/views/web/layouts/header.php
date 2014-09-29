<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo isset($title) ? $title : 'POECSTORE' ;?></title>
    <!-- Bootstrap CSS file -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


</head><!--/head-->

<body>
<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fa fa-phone"></i> +31 8 36 65 65 65 </a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> bgates@apple.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="index.php"><img src="<?php echo $href ?>images/logo.jpg" alt="logo"  name="logo" id="logo"/></a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="<?php echo isset($_SESSION['email']) ? $this->url('pages','profil') : $this->url('pages','login') ;?>"><i class="fa fa-user"></i>Votre compte <?php echo isset($_SESSION['email']) ? "(".$_SESSION['email'].")" : '' ;?></a></li>
                            <li><a href="<?php echo $this->url('pages','panier');?>"><i class="fa fa-shopping-cart"></i> Panier  <?php  echo  (isset($_SESSION['panier']))  ? "(".array_sum($_SESSION['panier']).")" : "" ;?></a></li>
                            <li><a href="<?php echo isset($_SESSION['email']) ? $this->url('pages','deconnexion') : $this->url('pages','login') ;?>"><i class="fa fa-lock"></i><?php echo isset($_SESSION['email']) ? ' Déconnexion' : ' Connexion' ;?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Accueil</a></li>
                            <li class="dropdown"><a href="#">Boutique<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="index.php">Nouveauté</a></li>
                                    <li><a href="<?php echo $this->url('pages','panier');?>">Panier</a></li>
                                    <li><a href="<?php echo $this->url('pages','login');?>">Connexion</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo $this->url('pages','contact');?>">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="">
                    <div class="col-sm-2">
                        <select id="categorie">
                            <option value="Nouveauté">Nouveauté</option>
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php  echo $category->getid(); ?>"><?php  echo $category->getnom(); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <select id="mot_cle">
                            <?php foreach ($mot_cles as $mot_cle) : ?>
                                <option value="<?php  echo $mot_cle->getid(); ?>"><?php  echo $mot_cle->getnom(); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                    <button id="submit_search" class="btn btn-default" >Rechercher</button>
                   </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->

    <script>
        $(document).ready(function()
         {
         $("#submit_search").click(function(){
             var categorie = $('#categorie option:selected').val();
             var mot_cle=$('#mot_cle option:selected').val(); ;
             if ($('#categorie option:selected').val()=='Nouveauté')
             {
                 categorie = 0;
             }
             var url = 'index.php?cat='+categorie+'&mot='+mot_cle;
             window.location.href=url;
         })
         });
    </script>

    <?php if ($flash = $this->flash()) { ?>
        <div class="alert alert-<?php echo $flash['type']; ?> role="alert" ><?php echo $flash['message']; ?></div>
    <?php } ?>
</header><!--/header-->
