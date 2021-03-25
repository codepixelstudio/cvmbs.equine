<?php

    // setup query parameters
    $news = array(

        'post_type'      => 'post',
        'posts_per_page' => 5

    );

    // setup query
    $news_query = new WP_Query( $news );

    // setup topics list
    $topics = get_categories( array( 'get' => 'all' ));

    // topics list iteration
    foreach ( $topics as $topic ) {

        if ( $topic->slug != 'uncategorized' ) {

            $topic_link = get_category_link( $topic->term_id );

            $topic_list .= '<a href="' . $topic_link . '" class="taxonomy_item">' . $topic->name . '</a>';

        }

    }

    // setup tag cloud
    $tags = get_tags(

        array(

            'get'         => 'all',
            'hide_empty'  => true,
            'orderby'     => 'count',
            'order'       => 'DESC',
            // 'count' => true,
            'number'      => 18

        )

    );

    // setup refined tag cloud
    $params = array(

        'smallest'      => 12,
        'largest'       => 12,
        'unit'          => 'px',
        'number'        => 20,
        'orderby'       => 'count',
        'order'         => 'DESC',
        'show_count'    => 0

    );

    // tag cloud iteration
    foreach ( $tags as $tag ) {

        $tag_link = get_tag_link( $tag->term_id );

        $tag_list .= '<a href="' . $tag_link . '" class="taxonomy_item">' . $tag->name . '</a>';

    }

    // custom blog text
    $blog_options = get_field( 'blog_options' );

?>

<!-- blog -->
<section id="homepage_news">

    <!-- heading -->
    <h2>

        <?php

            if ( $blog_options[ 'title' ] ) {

                echo $blog_options[ 'title' ];

            } else {

                echo 'news and updates';

            }

        ?>

    </h2>
    <!-- END heading -->

    <!-- content -->
    <div class="news_content">

        <!-- articles -->
        <div class="news_articles">

            <?php while ( $news_query->have_posts() ) : $news_query->the_post(); ?>

            <?php

                // post vars
                $category = get_the_category();
                $author   = get_the_author();
                $publish  = get_the_date();
                $image    = has_post_thumbnail() ? 'style="background-image:url(' . get_the_post_thumbnail_url( get_the_id(), 'x-large' ) . ');"' : '';

            ?>

            <!-- post -->
            <article class="article">

                <!-- link -->
                <a href="<?php the_permalink(); ?>" class="article_image" <?php echo $image; ?>>

                    read more

                </a>
                <!-- END link -->

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
        <!-- END articles -->

        <!-- meta -->
        <aside class="news_metadata">

            <!-- description -->
            <p class="metadata description">

                <?php

                    if ( $blog_options[ 'description' ] ) {

                        echo $blog_options[ 'description' ];

                    } else {

                        echo 'set custom blog description text via Pages->Homepage->ERL Homepage Options';

                    }

                ?>

            </p>
            <!-- END description -->

            <!-- metadata group -->
            <section class="metadata topics">

                <!-- title -->
                <span class="metadata_title">

                    browse articles by topic

                </span>
                <!-- END title -->

                <!-- taxonomy group -->
                <div class="taxonomy_group">

                    <?php echo $topic_list; ?>

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

                    <?php echo $tag_list; ?>

                </div>
                <!-- END taxonomy group -->

            </section>
            <!-- END metadata group -->

        </aside>
        <!-- END meta -->

    </div>
    <!-- END content -->

</section>
<!-- END blog -->
