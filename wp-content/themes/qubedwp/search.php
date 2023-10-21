<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <div class="block-search py-5" data-block-count="1">

        <div class="container">

            <div class="row">
                <div class="col-lg">

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

                        <ul class="list-group my-5">

                            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                                <li class="list-group-item">

                                    <a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a>

                                </li>

                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>

                        </ul>

                    <?php else : ?>

                        <?php _e('Sorry, we hebben niets gevonden...'); ?>

                    <?php endif; ?>

                </div>
            </div>

        </div>

    </div>

</main>

<?php get_footer(); ?>
