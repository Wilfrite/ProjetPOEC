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
    <h2 class="heading">Step1</h2>
</div>
<div class="checkout-options">
    <h3>New User</h3>
    <p>Checkout options</p>
    <ul class="nav">
        <li>
            <label><input type="checkbox"> Register Account</label>
        </li>
        <li>
            <label><input type="checkbox"> Guest Checkout</label>
        </li>
        <li>
            <a href=""><i class="fa fa-times"></i>Cancel</a>
        </li>
    </ul>
</div><!--/checkout-options-->

<div class="register-req">
    <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
</div><!--/register-req-->

<div class="shopper-informations">
    <div class="row">
        <div class="col-sm-3">
            <div class="shopper-info">
                <p>Shopper Information</p>
                <form>
                    <input type="text" placeholder="Display Name">
                    <input type="text" placeholder="User Name">
                    <input type="password" placeholder="Password">
                    <input type="password" placeholder="Confirm password">
                </form>
                <a class="btn btn-primary" href="">Get Quotes</a>
                <a class="btn btn-primary" href="">Continue</a>
            </div>
        </div>
        <div class="col-sm-5 clearfix">
            <div class="bill-to">
                <p>Bill To</p>
                <div class="form-one">
                    <form>
                        <input type="text" placeholder="Company Name">
                        <input type="text" placeholder="Email*">
                        <input type="text" placeholder="Title">
                        <input type="text" placeholder="First Name *">
                        <input type="text" placeholder="Middle Name">
                        <input type="text" placeholder="Last Name *">
                        <input type="text" placeholder="Address 1 *">
                        <input type="text" placeholder="Address 2">
                    </form>
                </div>
                <div class="form-two">
                    <form>
                        <input type="text" placeholder="Zip / Postal Code *">
                        <select>
                            <option>-- Country --</option>
                            <option>United States</option>
                            <option>Bangladesh</option>
                            <option>UK</option>
                            <option>India</option>
                            <option>Pakistan</option>
                            <option>Ucrane</option>
                            <option>Canada</option>
                            <option>Dubai</option>
                        </select>
                        <select>
                            <option>-- State / Province / Region --</option>
                            <option>United States</option>
                            <option>Bangladesh</option>
                            <option>UK</option>
                            <option>India</option>
                            <option>Pakistan</option>
                            <option>Ucrane</option>
                            <option>Canada</option>
                            <option>Dubai</option>
                        </select>
                        <input type="password" placeholder="Confirm password">
                        <input type="text" placeholder="Phone *">
                        <input type="text" placeholder="Mobile Phone">
                        <input type="text" placeholder="Fax">
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="order-message">
                <p>Shipping Order</p>
                <textarea name="message"  placeholder="Notes about your order, Special Notes for Delivery" rows="16"></textarea>
                <label><input type="checkbox"> Shipping to bill address</label>
            </div>
        </div>
    </div>
</div>
<div class="review-payment">
    <h2>Review & Payment</h2>
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
                            <div class="cart_quantity_button">

                                <form method="post"  name="addtocartquantity" action="<?php echo $this->url('pages','addToCart',$item_panier->getid());?>">
                                    <input class="cart_quantity_input" type="text" name="quantite_modifie_article" value="<?php echo $_SESSION['panier'][$item_panier->getid()] ;?>"  size="2">
                                    <button type="submit" class="btn btn-default cart" name="submit_to_cart" >Modifier
                                    </button></form>
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
                        </table>
                    </td>
                </tr>
                </tbody>
            </table></div>
    <?php } else {?>

        <h1> Votre panier est vide</h1><?php } ?>

<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
</div>
</div>
</section> <!--/#cart_items-->
<?php require ROOT.'/views/web/layouts/footer.php'; ?>