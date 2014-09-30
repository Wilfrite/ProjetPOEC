<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

    <section id="cart_items">
        <div class="container">
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
                    <?php  $total_panier = 0; foreach($panier_courant as $item_panier) : ?>
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
                                    <p><?php echo $_SESSION['panier'][$item_panier->getid()] ;?></p>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php  echo  $sous_total =  $item_panier->getprixTVA() *  $_SESSION['panier'][$item_panier->getid()];  ?>€</p>
                            </td>
                        </tr>
                        <!-- end foreach -->
                        <!-- cumul total-->
                        <?php $total_panier += $item_panier->getprix() *  $_SESSION['panier'][$item_panier->getid()];
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="total_area">
                        <ul>
                            <li>Adresse de Facturation</li>
                            <li>Adresse :<span><?php echo isset($viewProfil[0]->adresse) ? $viewProfil[0]->adresse : '' ?></span></li>
                            <li>Code Postal :<span><?php echo isset( $viewProfil[0]->cp) ? $viewProfil[0]->cp : ''; ?></span></li>
                            <li>Ville :<span><?php echo isset($viewProfil[0]->ville) ? $viewProfil[0]->ville : ''; ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="total_area">
                        <ul>
                            <li>Adresse de Livraison</li>
                            <li>Adresse :<span><?php echo isset($_SESSION['validation']['client']['adresse']) ? $_SESSION['validation']['client']['adresse'] : '' ?></span></li>
                            <li>Code Postal :<span><?php echo isset($_SESSION['validation']['client']['codePostal']) ? $_SESSION['validation']['client']['codePostal'] : ''; ?></span></li>
                            <li>Ville :<span><?php echo isset($_SESSION['validation']['client']['ville']) ? $_SESSION['validation']['client']['ville'] : ''; ?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="total_area">
                        <ul>
                            <li>Sous-total hors taxe<span><?php echo $total_panier ; ?> €</span></li>
                            <li>Montant TVA<span><?php echo $montant_tva = $total_panier * $tva;   ?> €</span></li>
                            <li>Frais de port <span>Gratuit</span></li>
                            <li>Total <span><?php echo $totalglobal = $total_panier + $montant_tva; ?> €</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>