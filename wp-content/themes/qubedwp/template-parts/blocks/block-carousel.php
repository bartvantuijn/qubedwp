<?php
// BLOCK CAROUSEL

// GET BLOCK DATA
$background = get_sub_field('achtergrond');
$color = get_sub_field('kleur');
$text = get_sub_field('tekst');
$slides = get_sub_field('slides');

if ( $slides ) : ?>

<div class="block-carousel <?php echo $background . ' ' . $color; ?>" data-block data-block-background="<?php echo $background; ?>" data-block-count="<?php echo $args['blockCount']; ?>">

    <div class="container">

        <div class="row">
            <div class="col-lg" data-aos="fade-up">

                <?php if ( $text ) : ?>

                    <?php echo $text; ?>

                <?php endif; ?>

            </div>
        </div>

        <div id="carouselExampleControls<?php echo $args['blockCount']; ?>" class="carousel slide p-4" data-bs-ride="carousel">
            <div class="carousel-inner">

                <?php while ( have_rows('slides') ) : the_row();

                    $text = get_sub_field('tekst');
                    $link = get_sub_field('link'); ?>

                    <div class="carousel-item <?php echo get_row_index() == 1 ? ' active' : ''; ?> row ms-0">

                        <div class="col-lg-3">
                            <div class="card shadow">
                                <div class="card-body">

                                    <?php echo $text; ?>

                                </div>
                            </div>
                        </div>

                    </div>

                <?php endwhile; ?>

            </div>

            <?php if ( count(get_sub_field('slides')) > 1 ) : ?>

                <button class="carousel-control-prev <?php echo $color; ?>" type="button" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide="prev" style="width:25px;">
                    <i class="fas fa-chevron-left"></i>
                    <span class="visually-hidden">Previous</span>
                </button>

                <button class="carousel-control-next <?php echo $color; ?>" type="button" data-bs-target="#carouselExampleControls<?php echo $args['blockCount']; ?>" data-bs-slide="next" style="width:25px;">
                    <i class="fas fa-chevron-right"></i>
                    <span class="visually-hidden">Next</span>
                </button>

            <?php endif; ?>

        </div>
    </div>

</div>

<style type="text/css">
    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item {
        z-index: 2;
    }
    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item.active {
        z-index: 1;
    }

    @media (max-width: 991px) {
        #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item > div {
            display: none;
        }
        #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item > div:first-child {
            display: block;
        }
    }

    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item.active,
    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-next,
    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-prev {
        display: flex;
    }

    @media (min-width: 992px) {
        #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-end.active,
        #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-next {
            transform: translateX(25%);
        }

        #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-start.active,
        #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-prev {
            transform: translateX(-25%);
        }
    }

    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-end,
    #carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-inner .carousel-item-start {
        transform: translateX(0);
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        let items = $('#carouselExampleControls<?php echo $args['blockCount']; ?> .carousel-item');
        items.each(function () {
            const minPerSlide = 4;
            let next = $(this).next();
            for (let i = 1; i < minPerSlide; i++) {
                if (!next.length) {
                    next = items.first();
                }
                $(this).append(next.clone().children().eq(0));
                next = next.next();
            }
        });
    });
</script>

<?php endif; ?>