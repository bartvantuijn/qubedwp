<?php
// BLOCK POSTS

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$posts = get_sub_field('posts');

if ( $posts ) : ?>

    <div class="block-post <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row g-4">

                <?php foreach( $posts as $post ):

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="col-6 col-md-3" data-aos="fade-up">

                        <div class="card border-0">
                            <a href="<?php the_permalink(); ?>" class="card-image-top mb-3" style="background-image:url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id($post->ID), 'full') ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-repeat:no-repeat;"></a>
                            <div class="card-body text-body p-0">
                                <h2 class="card-title h5"><?php the_title(); ?></h2>
                                <?php if ( get_post_type() == 'product' && class_exists( 'woocommerce' ) ) :
                                    $product = wc_get_product( get_the_id() );

                                    $newness_days = 60;
                                    $created = strtotime( $product->get_date_created() );

                                    if ( ( time() - ( 60 * 60 * 24 * $newness_days ) ) < $created ) {
                                        echo '<span class="badge bg-primary position-absolute top-0 end-0 m-3">' . esc_html__( 'Nieuw!', 'woocommerce' ) . '</span>';
                                    } ?>
                                    <span class="price" style="display:block;"><?php echo wc_price($product->get_price()); ?></span>
                                <?php else : ?>
                                    <?php if(get_the_date()) : ?>
                                        <small style="display:block;"><i class="fas fa-calendar-alt me-2"></i><?php echo get_the_date(); ?></small>
                                    <?php endif; ?>
                                    <?php if(get_the_excerpt()) : ?>
                                        <p class="card-text mt-3"><?php echo get_the_excerpt(); ?></p>
                                    <?php endif; ?>
                                <?php endif; ?>
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