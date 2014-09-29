<?php require_once ROOT.'/views/web/layouts/header.php'; ?>


    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-3">
                    <div class="login-form">
                        <h2>Information Carte bleu</h2>
                        <form role="form" class="clearfix" method="post" >
                            <input type="text" id="nom" name="nom" placeholder="Nom et Prenom" />
                            <input type="text" id="nb_cb" name="nb_cb" placeholder="Numero de la CB" />
                            <div class="col-sm-6">
                                <SELECT name="mois" size="1">
                                    <OPTION>01
                                    <OPTION>02
                                    <OPTION>03
                                    <OPTION>04
                                    <OPTION>05
                                    <OPTION>06
                                    <OPTION>07
                                    <OPTION>08
                                    <OPTION>09
                                    <OPTION>10
                                    <OPTION>11
                                    <OPTION>12
                                </SELECT></br></br>
                            </div>
                            <div class="col-sm-6">
                                <SELECT name="annee" size="1">
                                    <OPTION>2015
                                    <OPTION>2016
                                    <OPTION>2017
                                    <OPTION>2018
                                    <OPTION>2019
                                    <OPTION>2020
                                </SELECT></br></br>
                            </div>
                            <!-- <input type="date" id="date" name="date" placeholder="Date d'expiration" /> -->
                            <input type="text" id="nb_verif" name="nb_verif" placeholder="Cryptograme" />
                            <button type="submit" name="submit_cb_form" class="btn btn-default">Valide</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>