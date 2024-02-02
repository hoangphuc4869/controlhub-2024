<?php
/*

Template Name: Home page

*/

get_header(); ?>

<!-- slider-heading -->

<div class="slider-heading swiper mySwiper">

    <div class="swiper-wrapper">
        <?php if( have_rows('slider-banner') ): ?>
        <?php while( have_rows('slider-banner') ): the_row(); 
	                $image = get_sub_field('img');
	                $picture = $image['sizes']['thumbnail']; 
	                ?>

        <div class="swiper-slide position-relative">

            <img src="<?php echo $picture;?>" alt="<?php echo $image['alt'];?>">

            <div class="slider-heading-content">
                <div class="s-h-c-title"><?php echo get_sub_field('title'); ?></div>

                <div class="s-h-c-des"><?php the_sub_field('excerpt'); ?></div>

                <button class="shop-now">
                    <a href="<?php echo get_sub_field('link'); ?>">
                        <?php echo get_field('shop-now'); ?>
                    </a>

                    <i class="fal fa-arrow-right"></i>
                </button>
            </div>

        </div>

        <?php endwhile; ?>
        <?php endif; ?>
    </div>

    <div class="swiper-pagination"></div>

</div>

<!-- discounts -->

<div class="bg-use">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12">
                <?php if( have_rows('list-use') ): ?>
                <?php while( have_rows('list-use') ): the_row(); 
			                $image = get_sub_field('img');
			                $picture = $image['sizes']['thumbnail']; 
			                ?>

                <div class="how-to-use">
                    <img src="<?php echo $picture;?>" alt="<?php echo $image['alt'];?>">

                    <div class="how-to-use-2">
                        <h2 class="title-use"><?php echo get_sub_field('title'); ?></h2>

                        <p class="text-use"><?php echo get_sub_field('excerpt'); ?></p>

                        <button class="shop-now discount-shop">
                            <a href="<?php echo get_sub_field('link'); ?>">
                                <?php echo get_field('shop-now'); ?>
                            </a>

                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="col-lg-6 col-12">
                <?php if( have_rows('list-use-2') ): ?>
                <?php while( have_rows('list-use-2') ): the_row(); 
			                $image = get_sub_field('img');
			                $picture = $image['sizes']['thumbnail']; 
			                ?>

                <div class="how-to-use">
                    <img src="<?php echo $picture;?>" alt="<?php echo $image['alt'];?>">

                    <div class="how-to-use-3">
                        <h2 class="title-use"><?php echo get_sub_field('title'); ?></h2>

                        <p class="text-use"><?php echo get_sub_field('excerpt'); ?></p>

                        <button class="shop-now discount-shop">
                            <a href="<?php echo get_sub_field('link'); ?>">
                                <?php echo get_field('shop-now'); ?>
                            </a>

                            <i class="fal fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Featured Products -->

<div class="f-p-wrapper">
    <div class="container products-slider">
        <div class="f-p-title"><?php echo get_field('featured-products'); ?></div>
        <div class="swiper productsSwiper">
            <div class="swiper-wrapper">

                <?php
					$tax_query[] = array(
					    'taxonomy' => 'product_visibility',
					    'field'    => 'name',
					    'terms'    => 'featured',
					    'operator' => 'IN',
					);
				?>

                <?php $args = array( 
					'post_type' => 'product',
					'posts_per_page' => 10,
					'ignore_sticky_posts' => 1, 
					'tax_query' => $tax_query
				); ?>

                <?php $getposts = new WP_query( $args);?>

                <?php while ($getposts->have_posts()) : $getposts->the_post();
            
            
            ?>

                <div class="swiper-slide">
                    <div class="bg-feature">
                        <?php if($product->get_sale_price()) { ?>
                        <div class="sale-tag">Sale</div>
                        <?php } ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'id' =>'img-feature') ); ?>
                        </a>

                        <h4 class="category-feature">
                            <?php
                        $categories = wc_get_product_category_list($product->get_id());
                        $categories_with_space = str_replace(',', ' ', $categories); 
                        echo $categories_with_space; 
                        ?>
                        </h4>

                        <h3 class="title-feature"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                        <div class="text-feature"><?php the_excerpt();?></div>

                        <div class="price-block">
                            <?php if($product->get_sale_price()) { ?>
                            <div class="price-salee"><?php echo wc_price($product->get_sale_price()); ?></div>
                            <del class="price-ori"><?php echo wc_price($product->get_regular_price()); ?></del>
                            <?php } else { ?>
                            <div class="price-ori-without-sale"><?php echo wc_price($product->get_regular_price()); ?>
                            </div>
                            <?php } ?>
                        </div>

                        <p class="quick-add">
                            <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">
                                Quick Add
                            </a>
                        </p>
                    </div>
                </div>

                <?php endwhile; wp_reset_postdata(); ?>

            </div>
            <div class="swiper-pagination-products"></div>
        </div>

    </div>
</div>

<!-- Top brand -->

<div class="mr-top">

    <div class="top-brands container">
        <?php echo get_field('top-brand'); ?>

        <div class="brand-slider">
            <div class="slide-track">
                <?php if( have_rows('list-brand') ): ?>
                <?php while( have_rows('list-brand') ): the_row(); 
			                $image = get_sub_field('img');
			                $picture = $image['sizes']['thumbnail']; 
			                ?>

                <div class="slide">
                    <img src="<?php echo $picture;?>" alt="<?php echo $image['alt'];?>">
                </div>

                <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- Our product categories -->

<div class="container product-categ">
    <div class="p-c-title">
        <p><?php echo get_field('our-categories'); ?></p>

        <p><?php the_field('excerpt'); ?></p>

        <div class="swiper cateSwiper">
            <div class="swiper-wrapper position-relative">
                <?php $args = array( 
				    'hide_empty' => 0,
				    'taxonomy' => 'product_cat',
				    'orderby' => 'id',
				    'parent' => 0
				); 

				$cates = get_categories( $args ); ?>

                <?php foreach ( $cates as $cate ) {  ?>
                <?php 
			    		$thumbnail_id = get_woocommerce_term_meta($cate->term_id, 'thumbnail_id', true );
					    $image = wp_get_attachment_url( $thumbnail_id );
			    	?>

                <div class="swiper-slide">

                    <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                        <div class="our-categories">
                            <img class="img-our-category" src="<?php echo $image; ?>" alt="<?php echo $cate->name; ?>">

                            <h2 class="title-our-category"><?php echo $cate->name; ?></h2>
                        </div>
                    </a>

                </div>

                <?php } ?>

            </div>
            <div class="swiper-pagination-cate"></div>
        </div>

        <!-- <div id="as" class="owl-carousel owl-theme carousel_2">
            <?php $args = array( 
				    'hide_empty' => 0,
				    'taxonomy' => 'product_cat',
				    'orderby' => 'id',
				    'parent' => 0
				); 

				$cates = get_categories( $args ); ?>

            <?php foreach ( $cates as $cate ) {  ?>
            <?php 
			    		$thumbnail_id = get_woocommerce_term_meta($cate->term_id, 'thumbnail_id', true );
					    $image = wp_get_attachment_url( $thumbnail_id );
			    	?>

            <div class="item">

                <a href="<?php echo get_term_link($cate->slug, 'product_cat'); ?>">
                    <div class="our-categories">
                        <img class="img-our-category" src="<?php echo $image; ?>" alt="<?php echo $cate->name; ?>">

                        <h2 class="title-our-category"><?php echo $cate->name; ?></h2>
                    </div>
                </a>

            </div>

            <?php } ?>
        </div> -->


    </div>
</div>


<!-- smart buy -->

<div class="container">
    <div class="bg-smart">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="bg-smart-2">
                    <h1 class="title-smart-buy"><?php echo get_field('smart-buy'); ?></h1>

                    <p class="text-smart-buy"><?php echo get_field('text-smart-buy'); ?></p>

                    <button class="shop-now-buy">
                        <a href="<?php echo get_field('link-smart-buy'); ?>">
                            <?php echo get_field('shop-now'); ?>
                        </a>

                        <i class="fal fa-arrow-right"></i>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-12">
                <?php $image = get_field('img-smart-buy-2');

			        if( !empty( $image ) ): ?>

                <img class="img-smart" src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" />

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>


<!-- New Products -->
<div class="new-products container">
    <div class="n-p-title"><?php echo get_field('new-products')?></div>
    <div class="row">
        <div class="col-lg-6">
            <div class="n-p-left h-100 position-relative">
                <img src="<?php echo get_field('new-product-img')?>" alt="" class="img-fluid h-100" />
                <div class="n-p-left-content">
                    <p><?php echo get_field('sale-up-to-text')?></p>
                    <p><?php echo get_field('sale-up')?></p>
                    <button class="shop-now s-b-btn n-p-btn">
                        <a href="<?php echo get_field('shop-now-link')?>"><?php echo get_field('shop-now-text')?></a>
                        <i class="fal fa-arrow-right"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="swiper newProductsSwiper">
                <div class="swiper-wrapper">
                    <?php
					$tax_query[] = array(
					    'taxonomy' => 'product_visibility',
					    'field'    => 'name',
					    'terms'      => 'featured',
					    'operator' => 'IN',
					);
				?>

                    <?php $args = array( 
					'post_type' => 'product',
					'posts_per_page' => 10,
					'ignore_sticky_posts' => 1, 
					'tax_query' => $tax_query
				); ?>

                    <?php $getposts = new WP_query( $args);?>

                    <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

                    <div class="swiper-slide">
                        <div class="bg-feature">
                            <?php if($product->get_sale_price()) { ?>
                            <div class="sale-tag">Sale</div>
                            <?php } ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'id' =>'img-feature') ); ?>
                            </a>

                            <h4 class="category-feature">
                                <?php
                        $categories = wc_get_product_category_list($product->get_id());
                        $categories_with_space = str_replace(',', ' ', $categories); 
                        echo $categories_with_space; 
                        ?>
                            </h4>

                            <h3 class="title-feature"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                            <div class="text-feature"><?php the_excerpt();?></div>

                            <div class="price-block">
                                <?php if($product->get_sale_price()) { ?>
                                <div class="price-salee"><?php echo wc_price($product->get_sale_price()); ?></div>
                                <del class="price-ori"><?php echo wc_price($product->get_regular_price()); ?></del>
                                <?php } else { ?>
                                <div class="price-ori-without-sale">
                                    <?php echo wc_price($product->get_regular_price()); ?></div>
                                <?php } ?>
                            </div>

                            <p class="quick-add">
                                <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">
                                    Quick Add
                                </a>
                            </p>
                        </div>
                    </div>

                    <?php endwhile; wp_reset_postdata(); ?>


                </div>
                <div class="swiper-pagination-products"></div>
            </div>
        </div>
    </div>
</div>


<!-- flash deals -->
<div class="flash-deals container">
    <div class="f-d-title">Flash Deals</div>
    <div class="swiper swiperFlashDeals position-relative">
        <div class="swiper-wrapper">
            <?php
					$tax_query[] = array(
					    'taxonomy' => 'product_visibility',
					    'field'    => 'name',
					    'terms'    => 'featured',
					    'operator' => 'IN',
					);
				?>

            <?php $args = array( 
					'post_type' => 'product',
					'posts_per_page' => 10,
					'ignore_sticky_posts' => 1, 
					'tax_query' => $tax_query
				); ?>

            <?php $getposts = new WP_query( $args);?>

            <?php while ($getposts->have_posts()) : $getposts->the_post(); ?>

            <div class="swiper-slide">
                <div class="bg-feature">
                    <?php if($product->get_sale_price()) { ?>
                    <div class="sale-tag">Sale</div>
                    <?php } ?>
                    <a href="<?php the_permalink(); ?>">
                        <?php echo get_the_post_thumbnail(get_the_ID(), 'thumnail', array( 'id' =>'img-feature') ); ?>
                    </a>

                    <h4 class="category-feature">
                        <?php
                        $categories = wc_get_product_category_list($product->get_id());
                        $categories_with_space = str_replace(',', ' ', $categories); 
                        echo $categories_with_space; 
                        ?>
                    </h4>

                    <h3 class="title-feature"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                    <div class="text-feature"><?php the_excerpt();?></div>

                    <div class="price-block">
                        <?php if($product->get_sale_price()) { ?>
                        <div class="price-salee"><?php echo wc_price($product->get_sale_price()); ?></div>
                        <del class="price-ori"><?php echo wc_price($product->get_regular_price()); ?></del>
                        <?php } else { ?>
                        <div class="price-ori-without-sale"><?php echo wc_price($product->get_regular_price()); ?></div>
                        <?php } ?>
                    </div>

                    <p class="quick-add">
                        <a href="<?php bloginfo('url'); ?>?add-to-cart=<?php the_ID(); ?>">
                            Quick Add
                        </a>
                    </p>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="swiper-pagination-deals"></div>
    </div>
</div>

<!-- blogs -->
<div class="blog container">
    <div class="b-title">Blog</div>
    <p>
        Check our latest article to get meaning full content or tips for
        controlhub
    </p>
    <div class="row">
        <?php 
                            $args = array(
                                'posts_per_page' => 3,
                                'post_type'      => 'post',
                                'cat'            => 'blogs',
                            );
                            $the_query = new WP_Query( $args );
                            ?>
        <?php if( $the_query->have_posts() ): ?>
        <?php while( $the_query->have_posts() ) : $the_query->the_post();
                            $post_date = get_the_date('d. M Y');
                             ?>
        <div class="col-lg-4 col-sm-6">
            <a href="<?php the_permalink() ?>">
                <div class="blog position-relative">
                    <?php the_post_thumbnail() ?>
                    <div class="blog-content">
                        <div class="datee">
                            <?php echo get_the_date('d')?> <br />
                            <?php echo get_the_date('M')?>
                        </div>
                        <div class="b-c-title"> <?php the_title() ?>
                        </div>
                        <div class="b-c-text">
                            <?php the_excerpt() ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php wp_reset_query(); ?>





    </div>
</div>


<div class="container-fluid iconBox">
    <div class="row">
        <?php if(have_rows('box-icons','option')):
		while(have_rows('box-icons','option')): the_row(); ?>
        <div class="col-lg-3 col-6 boxWrap">
            <div class="box">
                <div class="icon">
                    <?php echo get_sub_field('icon-svg')?>
                </div>
                <div class="boxContent">
                    <p> <?php echo get_sub_field('box-content1')?></p>
                    <p> <?php echo get_sub_field('box-content2')?></p>
                </div>
            </div>
        </div>

        <?php endwhile; endif; ?>

    </div>
</div>




<?php get_footer(); ?>