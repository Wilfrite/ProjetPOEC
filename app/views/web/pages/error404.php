<?php require ROOT.'/views/web/layouts/header.php'; ?>
<div class="container text-center">
    <div class="logo-404">
        <a href="index.php"><img src="<?php echo $href ?>images/logo.jpg" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="<?php echo $href ?>images/404/404.png" class="img-responsive" alt="" />
        <h1><b>OUPS! </b>Page non trouvé</h1>
        <p>Veuillez nous excuser</p>
        <h2><a href="index.php">Retourner à l'accueil.</a></h2>
        <br>
    </div>
</div>
<?php require ROOT.'/views/web/layouts/footer.php'; ?>
