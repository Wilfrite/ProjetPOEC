<?php require ROOT.'/views/web/layouts/header.php'; ?>
<div class="container text-center">
    <div class="logo-404">
        <a href="index.php"><img src="<?php echo $href ?>images/home/logo.png" alt="" /></a>
    </div>
    <div class="content-404">
        <img src="<?php echo $href ?>images/404/404.png" class="img-responsive" alt="" />
        <h1><b>OUPS! </b>Nous n'avons pas trouvé cette page</h1>
        <p>Il semblerait que vous ayez cassé  quelque  chose. "Toutes nos pages sont nous appartiennent".</p>
        <h2><a href="index.php">Retourner à l'accueil.</a></h2>
    </div>
</div>
<?php require ROOT.'/views/web/layouts/footer.php'; ?>
