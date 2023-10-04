<?php
// BLOCK ACCORDION

// GET BLOCK DATA
$accordion = get_sub_field('accordion');

if ( $accordion ) : ?>

    <div class="block-accordion py-5" data-block-count="<?php echo $args['blockCount']; ?>">

        <div class="container">

            <div class="row">

                <?php if ( have_rows('accordion') ) :

                    $rowCount = 0; ?>

                    <div class="accordion" id="accordionExample<?php echo $args['blockCount']; ?>">

                        <?php while ( have_rows('accordion') ) : the_row();
                            $rowCount++;
                            $title = get_sub_field('titel');
                            $text = get_sub_field('tekst'); ?>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $rowCount; ?>" aria-expanded="false" aria-controls="collapse<?php echo $rowCount; ?>">
                                        <?php echo $title; ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $rowCount; ?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample<?php echo $args['blockCount']; ?>">
                                    <div class="accordion-body">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; ?>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </div>
    <style>
        .accordion-button:not(.collapsed) {
            background-color: var(--bs-primary-light);
        }
    </style>

<?php endif; ?>