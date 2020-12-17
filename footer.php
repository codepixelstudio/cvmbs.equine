        </div><!-- #content -->

        <?php get_template_part( 'elements/menus/menu.site.tabs' ); ?>

        <?php wp_footer(); ?>

        <?php

            $environment = $_SERVER[ 'DOCUMENT_ROOT' ];

            if ( $environment === '/var/www/html' ) {

                get_template_part( 'elements/developer/browser.sync' );

            }

        ?>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138956035-1"></script>
        <script>

            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push( arguments );}
            gtag( 'js', new Date() );

            gtag( 'config', 'UA-5893701-1' );

        </script>

        </body>

    </html>
