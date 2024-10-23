<?php get_header(); ?>

    <main id="main" class="site-main" role="main">

        <?php get_template_part('template-parts/blocks'); ?>

        <?php if ( have_posts() ) : ?>

            <div class="block-home" data-block data-block-background="bg-white">

                <div class="container">

                    <div class="row g-4">

                        <?php while ( have_posts() ) : the_post(); ?>

                            <div class="col-6 col-md-3" data-aos="fade-up">

                                <div class="card border-0">
                                    <a href="<?php the_permalink(); ?>" class="card-image-top mb-3" style="background-image:url('<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'full') ?: bloginfo('template_url') . '/img/placeholder.png'; ?>');background-size:cover;background-position:center;background-repeat:no-repeat;"></a>
                                    <div class="card-body text-body p-0">
                                        <h2 class="card-title h5"><?php the_title(); ?></h2>
                                        <?php if(get_the_date()) : ?>
                                            <small style="display:block;"><i class="fas fa-calendar-alt me-2"></i><?php echo get_the_date(); ?></small>
                                        <?php endif; ?>
                                        <?php if(get_the_excerpt()) : ?>
                                            <p class="card-text mt-3"><?php echo get_the_excerpt(); ?></p>
                                        <?php endif; ?>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary mt-3">Bekijk bericht</a>
                                    </div>
                                </div>

                            </div>

                        <?php endwhile; ?>

                    </div>

                </div>

            </div>

        <?php endif; ?>

    </main>

<?php get_footer(); ?>