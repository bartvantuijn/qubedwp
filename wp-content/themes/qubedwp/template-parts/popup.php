<?php

$popupActive = get_field('popup_actief', 'options');

if ( $popupActive ) :

    $popupText = get_field('popup_tekst', 'options');
    $popupLink = get_field('popup_link', 'options'); ?>

    <div id="popup" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <?php if ( $popupText ) : ?>
                    <div class="modal-body">
                        <?php echo $popupText; ?>
                    </div>
                <?php endif; ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="setCookie('website_popup', 'yes', 365);">Sluiten</button>
                    <?php if ( $popupLink ) :

                        if ( preg_match('~{(.*?)}~', $popupLink['title'], $output) ) {
                            $popupLink['title'] = explode('{', $popupLink['title'])[0];
                            $class = $output[1];
                        } else {
                            $class = 'btn-primary';
                        }

                        ?>

                        <button type="button" class="btn <?php echo $class; ?>" data-bs-dismiss="modal" onclick="setCookie('website_popup', 'yes', 365, null, '<?php echo $popupLink['url']; ?>');"><?php echo $popupLink['title']; ?></button>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>