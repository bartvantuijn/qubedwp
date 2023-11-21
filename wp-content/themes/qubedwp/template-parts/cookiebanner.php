<?php

$cookieBannerActive = get_field('cookiebanner_actief', 'options');

if ( $cookieBannerActive ) :

    $cookieBannerText = get_field('cookiebanner_tekst', 'options'); ?>

    <div id="cookiebanner" class="card position-fixed" style="right:0;bottom:0;width:100%;max-width:25rem;z-index:9999;">
        <div class="card-body">
            <h6 class="card-title text-muted" style="font-size:12px;position:absolute;right:0;top:0;padding:1rem;">Cookies<i class="fa fa-cookie-bite ms-2"></i></h6>
            <?php if ( $cookieBannerText ) : ?>
                <p class="card-text w-75">
                    <?php echo $cookieBannerText; ?>
                </p>
            <?php endif; ?>
            <button type="button" class="btn btn-primary" onclick="setCookie('website_cookies', 'yes', 365, $('#cookiebanner'));">Accepteren</button>
            <button type="button" class="btn btn-light" onclick="setCookie('website_cookies', 'no', 1, $('#cookiebanner'));">Weigeren</button>
            <?php
            $privacy_policy_page = get_option( 'wp_page_for_privacy_policy' );
            if( $privacy_policy_page ) :
                $permalink = esc_url( get_permalink( $privacy_policy_page ) ); ?>
                <button type="button" class="btn btn-light" onclick="setCookie('website_cookies', 'no', 1, null, '<?php echo $permalink; ?>');">Privacybeleid</button>
            <?php endif;?>
        </div>
    </div>

<?php endif; ?>