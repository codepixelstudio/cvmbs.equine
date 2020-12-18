<?php // Template Name: News ?>

<?php

    // setup query parameters
    $news = array(
        'post_type'      => 'post',
        // 'posts_per_page' => 3

    );

    // setup query
    $news_query = new WP_Query( $news );

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content news" data-off-canvas-content>

    <!-- news -->
    <section id="news_content">

        <!-- heading -->
        <h2>

            news and updates

        </h2>
        <!-- END heading -->

        <!-- grid -->
        <div id="news_grid">

        	<?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

            <?php

                // post vars
                $category = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

            ?>

            <!-- post -->
            <article <?php post_class(); ?>>

                <!-- image -->
                <div class="article_image" <?php echo $image; ?>>

                    <!-- button -->
                    <a class="article_link" href="<?php the_permalink(); ?>">

                        read more

                    </a>
                    <!-- END button -->

                </div>
                <!-- END image -->

                <!-- content -->
                <div class="article_content">

                    <!-- topic -->
                    <span class="article_topic">

                        <?php echo $category[ 0 ]->name; ?>

                    </span>
                    <!-- END topic -->

                    <!-- heading -->
                    <h3 class="article_title">

                        <?php the_title(); ?>

                    </h3>
                    <!-- END heading -->

                    <!-- metadata -->
                    <div class="article_metadata">

                        <!-- author -->
                        <span class="author">

                            <?php echo $author; ?>

                        </span>
                        <!-- END author -->

                        &nbsp;|&nbsp;

                        <!-- date -->
                        <span class="date">

                            <?php echo $publish; ?>

                        </span>
                        <!-- END date -->

                    </div>
                    <!-- END metadata -->

                    <?php the_excerpt(); ?>

                </div>
                <!-- END content -->

            </article>
            <!-- END post -->

        	<?php endwhile; ?>

        </div>
        <!-- END grid -->

    </section>
    <!-- END news -->

    <!-- navigation -->
    <section id="news_navigation">

        <?php echo foundationpress_pagination(); ?>

        <!-- ball so hard -->

        <?php get_template_part( 'elements/news/news.topics' ); ?>

        <?php get_template_part( 'elements/news/news.tags' ); ?>

    </section>
    <!-- END navigation -->

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
