<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

<section id="form">
    <div class="container">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-4">
                    <div class="shopper-info">
                        <p>Compte Utilisateur</p>
                        <form>
                            <input type="email" name="" id="" placeholder="email" value="<?php echo isset($viewProfil[0]->adresse_mail) ? $viewProfil[0]->adresse_mail : $_SESSION['email']; ?>">
                            <input type="password" name="motDePasse" id="motDePasse" placeholder="Mot de passe">
                            <input type="password" name="motDePasseNouveau" id="motDePasseNouveau" placeholder="Nouveau mot de passe">
                            <input type="password" name="motDePasseNouveauConfirmation" id="motDePasseNouveauConfirmation" placeholder="Confirmer Nouveau mot de passe">
                            <button type="submit" name="submit_update_user_form" class="btn btn-primary" >Modifier</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-8 clearfix">
                    <div class="bill-to">
                        <p>Profil</p>
                        <div class="form-one">
                            <form role="form" class="clearfix" method="post">
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