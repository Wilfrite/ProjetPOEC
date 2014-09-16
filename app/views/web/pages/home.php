<?php require ROOT.'/views/web/layouts/header.php'; ?>
    <section>
    <div class="container">
    <div class="row">
        <?php require ROOT.'/views/web/layouts/sidebar.php'; ?>
    <div class="col-sm-9 padding-right">
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Features Items</h2>
        <?php  foreach ($articles as $article) : ?>
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
                                <h2><?php echo $article->getprix() ;?>€</h2>
                                <p><a href="<?php echo $this->url('pages','article',$article->getid());?>"><?php echo $article->getnom() ;?></a></p>
                                <a href="<?php echo $this->url('pages','addToCart',$article->getid());?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div><!--features_items-->
    <ul class="pager">
        <li class="previous"><a href="#">&larr; Previous</a></li>
        <li class="next"><a href="#">Next &rarr;</a></li>
    </ul>
    <div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php foreach ($categories as $category) : ?>
            <li class="<?php echo ($id_category==$category->getId() ) ? 'active' : '' ;?>"><a href="index.php?cat=<?php  echo $category->getid(); ?>"><?php  echo $category->getnom(); ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
    <div class="tab-content">
    <?php foreach ($ArticlesByCategory as $article) : ?>
    <div class="tab-pane fade active in" id="<?php  echo $article->getnom(); ?>">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="<?php echo $hrefImage ?><?php echo $article->getimage() ;?>" id="ImageArticle" />
                        <h2><?php echo $article->getprix() ;?>€</h2>
                        <p><?php echo $article->getnom() ;?></p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
    </div>
    </div><!--/category-tab-->
<!--    --><?php //require ROOT.'/views/web/layouts/recommented_items.php'; ?><!-- -->
    </div>
    </div>
    </div>
    </section>
<?php require ROOT.'/views/web/layouts/footer.php'; ?>