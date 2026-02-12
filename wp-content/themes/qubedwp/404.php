<?php get_header(); ?>

    <main id="main" class="site-main" role="main">

        <div class="block-404" data-block data-block-count="1">

            <div class="container">

                <div class="row">
                    <div class="col-lg" data-aos="fade-up">

                        <h1><?php echo __('Niet gevonden', 'qubedwp'); ?></h1>
                        <p><?php echo __('Helaas, de pagina die je zoekt is niet gevonden.', 'qubedwp'); ?></p>
                        <?php get_search_form(); ?>

                    </div>
                </div>

            </div>

        </div>

    </main>

<?php get_footer(); ?>