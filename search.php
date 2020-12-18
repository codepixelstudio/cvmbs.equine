<?php

    $search = get_search_query();

    // setup query parameters
    $news = array(

        's' => $search

    );

    // setup query
    $news_query = new WP_Query( $news );

?>

<?php get_header(); ?>

<!-- site.layout -->
<main id="site-layout" class="off-canvas-content news" data-off-canvas-content>

    <!-- news -->
    <section id="news_content">

        <!-- header -->
        <div id="news_header">

            <!-- heading -->
            <h2>

                news and updates

            </h2>
            <!-- END heading -->

            <?php get_template_part( 'elements/search/search.posts' ); ?>

        </div>
        <!-- END header -->

        <!-- news navigation -->
        <div id="news_controls" class="news_navigation">

            <!-- navigation -->
            <aside id="news_taxonomy">

                <!-- metadata group -->
                <section class="metadata topics">

                    <!-- title -->
                    <span class="metadata_title">

                        browse articles by topic

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php get_template_part( 'elements/news/news.topics' ); ?>

                    </div>
                    <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

                <!-- metadata group -->
                <section class="metadata tags">

                    <!-- title -->
                    <span class="metadata_title">

                        browse articles by tag

                    </span>
                    <!-- END title -->

                    <!-- taxonomy group -->
                    <div class="taxonomy_group">

                        <?php get_template_part( 'elements/news/news.tags' ); ?>

                    </div>
                    <!-- END taxonomy group -->

                </section>
                <!-- END metadata group -->

            </aside>
            <!-- END navigation -->

        </div>
        <!-- END news navigation -->

        <?php if( $news_query->have_posts() ) : ?>

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
                <a href="<?php the_permalink(); ?>" class="article_image" <?php echo $image; ?>>

                    read more

                </a>
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

                        <a href="<?php the_permalink(); ?>">

                            <?php the_title(); ?>

                        </a>

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

        <!-- pagination -->
        <div id="news_pagination">

            <?php echo foundationpress_pagination(); ?>

        </div>
        <!-- END pagination -->

        <?php else : ?>

        <!-- empty -->
        <div class="empty">

            nothing to see here

        </div>
        <!-- END empty -->

        <?php endif; ?>

    </section>
    <!-- END news -->

	<?php get_template_part( 'elements/layout/layout.footer' ); ?>

</main>
<!-- site.layout -->

<?php get_footer(); ?>
