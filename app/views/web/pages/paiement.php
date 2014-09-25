<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="login-form"><!--login form-->
                        <h2>Login to your account</h2>
                        <form role="form" class="clearfix" method="post" action="<?php echo $this->url('pages', 'login'); ?>">
                            <input type="email" id="emaillog" name="emaillog" placeholder="Email Address" />
                            <input type="password" id="passwordlog" name="passwordlog" placeholder="Mot de Passe" />
                            <button type="submit" name="submit_login_form" class="btn btn-default">Login</button>
                        </form>
                    </div><!--/login form-->
                </div>
                <div class="col-sm-6">
                    <div class="signup-form"><!--sign up form-->
                        <h2>New User Signup!</h2>
                        <form role="form" class="clearfix" method="post" action="<?php echo $this->url('pages', 'login'); ?>">
                            <input type="email" id="email" name="email" placeholder="Email Address"/>
                            <input type="password" id="password" name="password" placeholder="Mot de Passe"/>
                            <button type="submit" name="submit_sign_form" class="btn btn-default">Signup</button>
                        </form>
                    </div><!--/sign up form-->
                </div>
            </div>
        </div>
    </section><!--/form-->

<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>