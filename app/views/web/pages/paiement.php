<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-3">
                    <div class="login-form">
                        <h2>Information Carte bleu</h2>
                        <form role="form" class="clearfix" method="post" action="<?php echo $this->url('pages', '#'); ?>">
                            <input type="text" id="nom" name="nom" placeholder="Nom et Prenom" />
                            <input type="text" id="nb_cb" name="nb_cb" placeholder="Numero de la CB" />
                            <input type="date" id="date" name="date" placeholder="Date d'expiration" />
                            <input type="text" id="nb_verif" name="nb_verif" placeholder="Cryptograme" />
                            <button type="submit" name="submit_cb_form" class="btn btn-default">Valide</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>