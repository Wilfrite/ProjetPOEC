<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Categories</h2>


        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <!-- Foreach Categories -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="index.php">Nouveauté</a></h4>
                        <?php foreach ($categories as $category) : ?>
                        <h4 class="panel-title"><a href="index.php?cat=<?php  echo $category->getid(); ?>"><?php  echo $category->getnom(); ?></a></h4>
                        <?php endforeach ?>
                    </div>
                </div>


        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Mot Clé</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <?php foreach ($mot_cles as $mot_cle) : ?>
                    <li><a href="index.php?mot=<?php echo $mot_cle->getid(); ?>"><span class="pull-right" ?><?php echo $mot_cle->nb_art; ?></span><?php echo $mot_cle->getnom(); ?></a></h4></li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div><!--/brands_products-->

<!--        <div class="price-range">-->
<!--            <h2>Price Range</h2>-->
<!--            <div class="well text-center">-->
<!--                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />-->
<!--                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>-->
<!--            </div>-->
<!--        </div>-->

    </div>
</div>