<?php require ROOT.'/views/web/layouts/header.php'; ?>
    <section>
    <div class="container">
    <div class="row">
        <?php require ROOT.'/views/web/layouts/sidebar.php'; ?>
    <div class="col-sm-9 padding-right">
    <div class="features_items" >
        <h2 class="title text-center"><?php echo (isset($_GET["cat"])==false) ? 'Nouveauté':  $ArticlesByMehtod[0]->nom_category; ?></h2>
        <?php  foreach ($ArticlesByMehtod as $article) : ?>
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?php echo $hrefImage ?><?php echo $article->getimage() ;?>" alt="ImageArticle" id="ImageArticle"/>
                            <h2><?php echo $article->getprix() ;?>€</h2>
                            <p><?php echo $article->getnom() ;?></p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                        <div class="product-overlay">
                            <div class="overlay-content">
                                <p><?php echo $article->getdescription() ;?></p>
                                <h2><?php echo $article->getprix() ;?>€</h2>
                                <p><a href="<?php echo $this->url('pages','article',$article->getid());?>"><?php echo $article->getnom() ;?></a></p>
                                <a href="<?php echo $this->url('pages','addToCart',$article->getid());?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<!--    --><?php //require ROOT.'/views/web/layouts/recommented_items.php'; ?><!-- -->
    </div>
    </div>
    </div>
    </section>
<?php require ROOT.'/views/web/layouts/footer.php'; ?>