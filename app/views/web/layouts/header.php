<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo isset($title) ? $title : 'POECSTORE' ;?></title>
    <!-- Bootstrap CSS file -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


</head>

<body>

    <!-- Header -->
<header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="index.php" class="navbar-brand">Astrospace</a>
        </div>
        <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
            <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav">
                <li class="<?php echo (isset($activePage) and ($activePage=='Home')) ? 'active' : '' ;?>"><a href="index.php">Home</a></li>
                <li class="<?php echo (isset($activePage) and ($activePage=='Contact')) ? 'active' : '' ;?>"><a href="index.php?c=pages&a=contact">Contact</a></li>
                <li class="<?php echo (isset($activePage) and ($activePage=='About')) ? 'active' : '' ;?>"><a href="index.php?c=pages&a=about">About</a></li>
            </ul>
        </nav>
    </div>
</header>

<!-- Body -->
<!--<div class="container">-->
<?php //if ($flash = $this->flash()){ ?>
<!--    <div class="alert alert---><?php //echo $flash['type']; ?><!--" role="alert">--><?php //echo $flash['message'];?><!--</div>-->
<?php //} ?>