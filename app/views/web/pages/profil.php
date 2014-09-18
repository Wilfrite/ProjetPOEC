<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

<section id="form">
    <div class="container">
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-4">
                    <div class="shopper-info">
                        <p>Compte Utilisateur</p>
                        <form>
                            <input type="email" placeholder="email">
                            <input type="password" placeholder="Password">
                            <input type="password" placeholder="New Password">
                            <input type="password" placeholder="Confirm password">
                            <button type="submit" name="submit_update_user_form" class="btn btn-primary" >Modifier</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-8 clearfix">
                    <div class="bill-to">
                        <p>Profil</p>
                        <div class="form-one">
                            <form>
                                <input type="text" placeholder="prenom">
                                <input type="text" placeholder="nom">
                                <input type="text" placeholder="Address 1">
                                <input type="text" placeholder="Code Postal">
                                <input type="text" placeholder="Ville">
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