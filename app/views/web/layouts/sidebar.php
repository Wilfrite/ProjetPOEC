<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>


        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <!-- Foreach Categories -->

<!--             --><?php //foreach ($categories as $category) { ?>
<!--            <div class="panel panel-default">-->
<!--                <div class="panel-heading">-->
<!--                    <h4 class="panel-title"><a href="link_to_posts_by_category/--><?php // echo $category['id']; ?><!--">--><?php // echo $category['title']; ?><!--</a></h4>-->
<!--                </div>-->
<!--            </div>-->
<!--              --><?php // } ?>



            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Nom des catégories</a></h4>
                </div>
            </div>
        </div><!--/category-products-->

        <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
                <ul class="nav nav-pills nav-stacked">
                    <!-- Foreach Tags -->
                    <!--             --><?php //foreach ($categories as $category) { ?>
                    <!--                     <li><a href="--><?php // echo $category['id']; ?><!--"> <span class="pull-right">--><?php // echo $category['nombre d'occurence par tags']; ?><!--</span><?php // echo $category['title']; ?></a></h4>-->
                    <!--              --><?php // } ?>
                    <li><a href="#"> <span class="pull-right">(Nombres)</span>Tags</a></li>
                </ul>
            </div>
        </div><!--/brands_products-->

        <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
        </div><!--/price-range-->

        <div class="shipping text-center"><!--shipping-->
            <img src="../images/home/shipping.jpg" alt="" />
        </div><!--/shipping-->

    </div>
</div>