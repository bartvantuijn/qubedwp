<?php get_header(); ?>

    <main id="main" class="site-main" role="main">

        <div class="block-search" data-block data-block-count="1">

            <div class="container">

                <div class="row">
                    <div class="col-lg" data-aos="fade-up">

                        <h1>Resultaten voor "<?php echo $_GET['s']; ?>"</h1>
                        <?php get_search_form(); ?>

                        <?php
                        global $query_string;
                        $query_args = explode("&", $query_string);
                        $search_query = array();

                        foreach( $query_args as $key => $string ) {
                            $query_split = explode("=", $string);
                            $search_query[$query_split[0]] = urldecode($query_split[1]);
                        }

                        $the_query = new WP_Query($search_query);
                        if ( $the_query->have_posts() ) : ?>

                            <ul class="list-group mt-4">

                                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                    <a href="<?php the_permalink(); ?>" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?php the_title(); ?></h5>
                                            <small class="text-body-secondary"><?php echo get_post_type_object(get_post_type($post->ID))->labels->singular_name; ?></small>
                                        </div>
                                        <p class="mb-1"><?php the_excerpt(); ?></p>
                                    </a>

                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>

                            </ul>

                        <?php else : ?>

                            <?php _e('Sorry, er is niets gevonden...'); ?>

                        <?php endif; ?>

                    </div>
                </div>

            </div>

        </div>

    </main>

<?php get_footer(); ?>
