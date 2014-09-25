<!-- Footer -->
<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Service</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo $this->url('pages','contact');?>">Contactez nous</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Conditions</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Conditions d'utilisation</a></li>
                            <li><a href="#">Politique de confidentialité</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>A propos</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Le magasin</a></li>
                            <li><a href="#">Copyright</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Information</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Votre adresse email" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Recevez les recentes informations <br /> et restez informé des dernieres nouveautés.</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright : 2013 POECSTORE Inc. Aucun droit reservé.</p>
                <p class="pull-right">Designed by <span>(on a pas retenu le nom du créateur du template, mais c'est l'équipe du POEC qui a ratttrapé le coup)</span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.scrollUp.min.js"></script>
<script src="js/price-range.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/main.js"></script>
<?php var_dump($_SESSION['validation']) ; ?><?php var_dump($_POST) ; ?>

</body>
</html>