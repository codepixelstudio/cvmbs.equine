<?php ?>

<!doctype html>

	<html class="no-js" <?php language_attributes(); ?> >

		<head>

			<meta charset="<?php bloginfo( 'charset' ); ?>" />

			<meta http-equiv="X-UA-Compatible" content="IE=edge">

			<meta name="viewport" content="width=device-width, initial-scale=1.0" />

			<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />

			<?php wp_head(); ?>

		</head>

		<?php $site_type = get_field( 'site_type', 'options' ); ?>

		<body <?php body_class(); ?> data-site-type="<?php echo $site_type; ?>">

			<a href="#content" class="skip-link screen-reader-text"><?php esc_html_e( 'Skip to content', 'cvmbsPress' ); ?></a>

			<?php get_template_part( 'elements/layout/layout.header' ); ?>

			<div id="content">
