<?php require ROOT.'/views/web/layouts/header.php'; ?>
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="<?php echo $this->url('pages','panier');?>">Panier</a></li>
                    <li class="active">Check out</li>
                </ol>
            </div><!--/breadcrums-->

            <div class="step-one">
                <h1 class="heading">Information Panier</h1>
            </div>
            <?php $total_panier = 0;
            if (!empty($panier_courant)) { ?>
                <div class="table-responsive cart_info">

                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image">Description</td>
                            <td class="description"></td>
                            <td class="price">Prix</td>
                            <td class="quantity">Quantité</td>
                            <td class="total">Total</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        <!--- foreach blabla -->

                        <?php  foreach($panier_courant as $item_panier) : ?>
                            <tr>
                                <td class="cart_product">
                                    <a href="<?php echo $this->url('pages','article',$item_panier->getid());?>"><img class="cart_img" src="<?php echo $hrefImage ?><?php echo $item_panier->getimage() ;?>" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="<?php echo $this->url('pages','article',$item_panier->getid());?>"><?php echo $item_panier->getnom() ;?></a></h4>

                                </td>
                                <td class="cart_price">
                                    <p><?php echo $item_panier->getprixTVA()  ;?>€</p>
                                </td>
                                <td class="cart_quantity">

                                <td class="cart_price">

                                    <p> <?php echo $_SESSION['panier'][$item_panier->getid()] ;?></p>
                                </td>

                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php  echo  $sous_total =  $item_panier->getprixTVA() *  $_SESSION['panier'][$item_panier->getid()];  ?>€</p>
                                </td>

                            </tr>
                            <!-- end foreach -->
                            <?php
                            $total_panier += $item_panier->getprix() *  $_SESSION['panier'][$item_panier->getid()];
                        endforeach; ?>

                        <tr>
                            <td colspan="4">&nbsp;</td>
                            <td colspan="2">
                                <table class="table table-condensed total-result">
                                    <tr>
                                        <td>Sous-total hors taxe</td>
                                        <td><?php echo $total_panier ; ?> €</td>
                                    </tr>
                                    <tr>
                                        <td>Montant TVA</td>
                                        <td> <?php echo $montant_tva = $total_panier * $tva;   ?> €</td>
                                    </tr>
                                    <tr class="shipping-cost">
                                        <td>Frais de port</td>
                                        <td>Gratuit</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td><span><?php echo $totalglobal = $total_panier + $montant_tva ; ?> €</span></td>
                                    </tr>
                                    <tr>
                                        <td><form method="post"  name="modify_cart" action="<?php echo $this->url('pages','panier');?>">
                                            <button type="submit" class="btn btn-default cart" name="modify_cart" >Modifier le panier
                                            </button></form></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                    </table></div>
            <?php } else {?>

                <h1> Votre panier est vide</h1><?php } ?>


            <div class="step-one">
                <h1 class="heading">Information Client</h1>
            </div>
            <!--<div class="checkout-options">-->
            <!--    <h3>New User</h3>-->
            <!--    <p>Checkout options</p>-->
            <!--    <ul class="nav">-->
            <!--        <li>-->
            <!--            <label><input type="checkbox"> Register Account</label>-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <label><input type="checkbox"> Guest Checkout</label>-->
            <!--        </li>-->
            <!--        <li>-->
            <!--            <a href=""><i class="fa fa-times"></i>Cancel</a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</div>-->
            <!--/checkout-options-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="shopper-info">

                            <p>Adresse de Facturation</p>
                            <form>
                                <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getprenom() : ''; ?>">
                                <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo isset($viewProfil[0]) ? $viewProfil[0]->getnom() :'' ?>">
                                <input type="text" name="adresse" id="adresse" placeholder="Address" value="<?php echo isset($viewProfil[0]->adresse) ? $viewProfil[0]->adresse : '' ?>">
                                <input type="text" name="codePostal" id="codePostal" placeholder="Code Postal" value="<?php echo isset( $viewProfil[0]->cp) ? $viewProfil[0]->cp : ''; ?>">
                                <input type="text" name="ville" id="ville" placeholder="Ville" value="<?php echo isset($viewProfil[0]->ville) ? $viewProfil[0]->ville : ''; ?>">

                            </form>
                            <!--                <a class="btn btn-primary" href="">Get Quotes</a>-->
                            <!--                <a class="btn btn-primary" href="">Continue</a>-->
                        </div>
                    </div>
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">

                            <div class="form-one">
                                <p>Adresse de Livraison</p>
                                <form  method="post" name="validation_adress" action="<?php echo $this->url('pages','validation_to_pay','first_adress');?>">
                                    <input type="text" name="prenom" id="prenom" placeholder="Prenom" value="<?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getprenom() : ''; ?>">
                                    <input type="text" name="nom" id="nom" placeholder="Nom" value="<?php echo isset($viewProfil[0]) ? $viewProfil[0]->getnom() :'' ?>">
                                    <input type="text" name="adresse" id="adresse" placeholder="Address" value="<?php echo isset($viewProfil[0]->adresse) ? $viewProfil[0]->adresse : '' ?>">
                                    <input type="text" name="codePostal" id="codePostal" placeholder="Code Postal" value="<?php echo isset( $viewProfil[0]->cp) ? $viewProfil[0]->cp : ''; ?>">
                                    <input type="text" name="ville" id="ville" placeholder="Ville" value="<?php echo isset($viewProfil[0]->ville) ? $viewProfil[0]->ville : ''; ?>">

                                    <button type="submit" name="submit_take_first_adress" class="btn btn-primary" >useit</button></form>
                            </div>

                            <div class="form-two">
                                <p>Ajouter une addresse</p>
                                <form  method="post" name="validation_adress" action="<?php echo $this->url('pages','validation_to_pay','second_adress');?>">
                                    <input type="text" name="prenom" id="prenom2" placeholder="Prenom" value="">
                                    <input type="text" name="nom" id="nom2" placeholder="Nom" value="">
                                    <input type="text" name="adresse" id="adresse2" placeholder="Address" value="">
                                    <input type="text" name="codePostal" id="codePostal2" placeholder="Code Postal" value="">
                                    <input type="text" name="ville" id="ville2" placeholder="Ville" value="">
                                    <button type="submit" name="submit_take_second_adress" class="btn btn-primary" >use it</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="order-message">
                            <p>Compléments de livraison</p>
                            <textarea name="message"  placeholder="Informations à transmettre à la société de livraison (code d'accès à la résidence, ...)" rows="16"></textarea>
                            <label><input type="checkbox"> Shipping to bill address</label>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section> <!--/#cart_items-->
<?php require ROOT.'/views/web/layouts/footer.php'; ?>