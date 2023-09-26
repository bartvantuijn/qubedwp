<?php
// BLOCK POSTS

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$posts = get_sub_field('posts');

if ( $posts ) : ?>

    <div class="block-posts <?php echo $background . ' ' . $color; ?> py-5" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row">

                <?php foreach( $posts as $post ):

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="col-6 col-md-3 mb-5" data-aos="fade-up">

                        <div class="card border-0">
                            <a href="<?php the_permalink(); ?>" class="card-image-top mb-3" style="min-height:350px;background-image:url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full') ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-repeat:no-repeat;"></a>
                            <div class="card-body text-body p-0">
                                <h2 class="card-title h6"><?php the_title(); ?></h2>
                                <?php if ( get_post_type() == 'product' && class_exists( 'woocommerce' ) ) :
                                    $product = wc_get_product( get_the_id() ); ?>
                                    <span class="price" style="display:block;"><?php echo wc_price($product->get_price()); ?></span>
                                <?php endif; ?>
                                <?php /* <p class="card-text"><?php the_excerpt(); ?></p> */ ?>
                                <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3">Bekijk <?php echo strtolower(get_post_type_object(get_post_type($post->ID))->labels->singular_name); ?></a>
                            </div>
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