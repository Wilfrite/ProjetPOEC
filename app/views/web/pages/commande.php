<?php require_once ROOT.'/views/web/layouts/header.php'; ?>

    <section id="cart_items">
        <div class="container">
            <h1>Commande n° <?php echo isset ($commande[0]) ? $commande[0]->getId() : ''; ?></h1>
            <p><h2>(effectuée le <?php echo isset ($commande[0]) ? $commande[0]->getDateCommande() : ''; ?> : <?php echo isset ($commande[0]) ? $commande[0]->getStatut() : ''; ?> pour le <?php echo isset ($commande[0]) ? $commande[0]->getDateReception() : ''; ?>)</h2></p>
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
                    <?php  $total_panier = 0; foreach($panier as $item_panier) : ?>
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
                                    <p><?php echo $item_panier->quantite ;?></p>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><?php  echo  $sous_total =  $item_panier->getprixTVA() *  $item_panier->quantite;  ?>€</p>
                            </td>
                        </tr>
                        <!-- end foreach -->
                        <!-- cumul total-->
                        <?php $total_panier += $item_panier->getprix() *  $item_panier->quantite;
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
                            <li>Nom :<span><?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getnom() : ''; ?></span></li>
                            <li>Prenom :<span><?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getprenom() : ''; ?></span></li>
                            <li>Adresse :<span><?php echo isset($commande[0]) ? $commande[0]->getAdrersseLivraison() : ''; ?></span></li>
                            <li>Code Postal :<span><?php echo isset($commande[0]) ? $commande[0]->getCpLivraison() : ''; ?></span></li>
                            <li>Ville :<span><?php echo isset($commande[0]) ? $commande[0]->getVilleLivraison() : '';?></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="total_area">
                        <ul>
                            <li>Adresse de Livraison</li>
                            <li>Nom :<span><?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getnom() : ''; ?></span></li>
                            <li>Prenom :<span><?php echo isset ($viewProfil[0]) ? $viewProfil[0]->getprenom() : ''; ?></span></li>
                            <li>Adresse :<span><?php echo isset($commande[0]) ? $commande[0]->getAdrersseFacturation() : ''; ?></span></li>
                            <li>Code Postal :<span><?php echo isset($commande[0]) ? $commande[0]->getCpFacturation() : ''; ?></span></li>
                            <li>Ville :<span><?php echo isset($commande[0]) ? $commande[0]->getVilleFacturation() : '';?></span></li>
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
        <div class="container text-center">
            <div class="content-404">
                <h3><a href="<?php echo isset($_SESSION['email']) ? $this->url('pages','profil') : $this->url('pages','login') ;?>">Retourner au profil.</a></h3>
            </div>
        </div>
    </section>

<?php require_once ROOT.'/views/web/layouts/footer.php'; ?>