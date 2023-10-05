<?php

$cookieBannerActive = get_field('cookiebanner_actief', 'options');

if ( $cookieBannerActive ) :

    $cookieBannerText = get_field('cookiebanner_tekst', 'options'); ?>

    <div class="card position-fixed" style="right:0;bottom:0;width:100%;max-width:25rem;z-index:9999;">
        <div class="card-body">
            <?php if ( $cookieBannerText ) : ?>
                <p class="card-text">
                    <?php echo $cookieBannerText; ?>
                </p>
            <?php endif; ?>
            <button type="button" class="btn btn-primary" onclick="setCookie('website_cookies', 'yes', 365);">Accepteren</button>
            <button type="button" class="btn btn-light" onclick="setCookie('website_cookies', 'no', 1);">Weigeren</button>
            <?php
            $privacy_policy_page = get_option( 'wp_page_for_privacy_policy' );
            if( $privacy_policy_page ) :
                $permalink = esc_url( get_permalink( $privacy_policy_page ) ); ?>
                <a href="<?php echo $permalink; ?>" class="btn btn-light">Privacybeleid</a>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>