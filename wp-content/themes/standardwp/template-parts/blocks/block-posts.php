<?php
// BLOCK POSTS

// GET LAYOUT DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');

// GET BLOCK DATA
$posts = get_sub_field('posts');

if ( $posts ) : ?>

    <div class="block-posts <?php echo $background . ' ' . $color; ?> py-5">

        <div class="container">

            <div class="row">

                <?php foreach( $posts as $post ):

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="col-lg card border-0">
                        <a href="#" class="card-image-top" style="min-height:350px;background-image:url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full') ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-repeat:no-repeat;"></a>
                        <div class="card-body text-body">
                            <h5><?php the_title(); ?></h5>
                            <?php if ( get_post_type() == 'product' && class_exists( 'woocommerce' ) ) :
                                $product = wc_get_product( get_the_id() ); ?>
                                <span class="price" style="display:block;"><?php echo wc_price($product->get_price()); ?></span>
                            <?php endif; ?>
                            <?php /* <p class="card-text"><?php the_excerpt(); ?></p> */ ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Bekijk <?php echo strtolower(get_post_type_object(get_post_type($post->ID))->labels->singular_name); ?></a>
                        </div>
                    </div>

                <?php endforeach; ?>

                <?php
                // Reset the global post object so that the rest of the page works correctly.
                wp_reset_postdata(); ?>

            </div>

        </div>

    </div>

<?php endif; ?>