<?php

    // register menus
	register_nav_menus(

		array(

			'equine-menu'       => __( 'ERL Main Menu', 'cvmbs' )

		)

	);

    // site menu
	function equine_site_menu( $menu_class, $menu_type ) {

	    wp_nav_menu( array(

	        'container' 	  => false,
	        'container_class' => '',
	        'menu' 			  => '',
			'menu_class' 	  => $menu_class,
            'items_wrap' 	  => '<ul id="%1$s" class="%2$s"' . $menu_type . '>%3$s</ul>',
	        'theme_location'  => 'equine-menu',
	        'before'		  => '',
	        'after' 		  => '',
	        'link_before' 	  => '',
	        'link_after' 	  => '',
	        'depth' 		  => 5,
	        'fallback_cb'	  => false,
	        'walker' 		  => new Off_Canvas_Menu_Walker(),

	    ));

	}

?>
