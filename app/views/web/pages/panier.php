    <?php require ROOT.'/views/web/layouts/header.php'; ?>

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li class="active">Panier</li>
                </ol>
            </div>
            <?php
            $total_panier = 0;
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
                            <!--- foreach elements -->
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
                                    <div class="cart_quantity_button">
                                        <form method="post"  name="addtocartquantity" action="<?php echo $this->url('pages','addToCart',$item_panier->getid());?>">
                                            <input class="cart_quantity_input" type="text" name="quantite_modifie_article" value="<?php echo $_SESSION['panier'][$item_panier->getid()] ;?>"  size="2">
                                            <button type="submit" class="btn btn-default cart" name="submit_to_cart" >Modifier</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price"><?php  echo  $sous_total =  $item_panier->getprixTVA() *  $_SESSION['panier'][$item_panier->getid()];  ?>€</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="<?php echo $this->url('pages','removeCart',$item_panier->getid());?>"><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                            <!-- end foreach -->
                            <!-- cumul total-->
                            <?php $total_panier += $item_panier->getprix() *  $_SESSION['panier'][$item_panier->getid()];
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php } else {?>
                <h1> Votre panier est vide</h1>
            <?php } ?>
        </div>
    </section> <!--/#cart_items-->
    <!-- section payment -->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
            </div>
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Sous-total hors taxe<span><?php echo $total_panier ; ?> €</span></li>
                            <li>Montant TVA<span><?php echo $montant_tva = $total_panier * $tva;   ?> €</span></li>
                            <li>Frais de port <span>Gratuit</span></li>
                            <li>Total <span><?php echo $totalglobal = $total_panier + $montant_tva; ?> €</span></li>
                        </ul>
                          <!-- <a class="btn btn-default update" href="">Update</a>-->
                          <!-- bouton dynamique selon condition de connection ou de panier vide -->
                        <a class="btn btn-default check_out" href="<?php echo isset($_SESSION['email']) && !empty($_SESSION['panier']) ? $this->url('pages','panier','valide')."\">"."Valider le panier" : (isset($_SESSION['email'])  && empty($_SESSION['panier']) ? $this->url('pages','index'). "\">" ."Votre panier est vide" : $this->url('pages','login')."\">"."Veuillez vous connectez"); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->

<?php require ROOT.'/views/web/layouts/footer.php'; ?>