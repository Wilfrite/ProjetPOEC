<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

<section id="form">
    <div class="container">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Change your mail</p>
                        <form role="form" class="clearfix" method="post">
                            <!-- on recupère les information de la base sur l'utilisateur connecté -->
                            <input type="email" name="email" id="email" placeholder="email" value="<?php echo isset($viewProfil[0]->adresse_mail) ? $viewProfil[0]->adresse_mail : $_SESSION['email']; ?>">
                            <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe">
                            <button type="submit" name="submit_update_mail_form" class="btn btn-primary" >Modifier</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="shopper-info">
                        <p>Change your password</p>
                        <form role="form" class="clearfix" method="post">
                            <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe">
                            <input type="password" name="motDePasseNouveau" id="motDePasseNouveau" placeholder="Nouveau mot de passe">
                            <input type="password" name="motDePasseNouveauConfirmation" id="motDePasseNouveauConfirmation" placeholder="Confirmer Nouveau mot de passe">
                            <button type="submit" name="submit_update_password_form" class="btn btn-primary" >Modifier</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-3 clearfix">
                    <div class="bill-to">
                        <p>Profil</p>
                        <div class="form-one">
                            <form role="form" class="clearfix" method="post">
                                <!-- on recupère les information de la base sur l'utilisateur connecté -->
                                <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getprenom() : ''; ?>">
                                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo isset($viewProfil[0]) ? $viewProfil[0]->getnom() :'' ?>">
                                <input type="text" name="adresse" id="adresse" placeholder="Address" value="<?php echo isset($viewProfil[0]->adresse) ? $viewProfil[0]->adresse : '' ?>">
                                <input type="text" name="codePostal" id="codePostal" placeholder="Code Postal" value="<?php echo isset( $viewProfil[0]->cp) ? $viewProfil[0]->cp : ''; ?>">
                                <input type="text" name="ville" id="ville" placeholder="Ville" value="<?php echo isset($viewProfil[0]->ville) ? $viewProfil[0]->ville : ''; ?>">
                                <button type="submit" name="submit_update_profil_form" class="btn btn-primary" >Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 clearfix">
                    <div class="bill-to">
                        <p>Commande passées</p>
                        <div class="form-one">
                            <form role="form" class="clearfix" method="post">
                                <!-- on recupère les information de la base sur l'utilisateur connecté -->
                                <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getprenom() : ''; ?>">
                                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo isset($viewProfil[0]) ? $viewProfil[0]->getnom() :'' ?>">
                                <input type="text" name="adresse" id="adresse" placeholder="Address" value="<?php echo isset($viewProfil[0]->adresse) ? $viewProfil[0]->adresse : '' ?>">
                                <input type="text" name="codePostal" id="codePostal" placeholder="Code Postal" value="<?php echo isset( $viewProfil[0]->cp) ? $viewProfil[0]->cp : ''; ?>">
                                <input type="text" name="ville" id="ville" placeholder="Ville" value="<?php echo isset($viewProfil[0]->ville) ? $viewProfil[0]->ville : ''; ?>">
                                <button type="submit" name="submit_update_profil_form" class="btn btn-primary" >Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>