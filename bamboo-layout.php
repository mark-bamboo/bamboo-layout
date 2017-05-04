<?php
/************************************************************************************************************/
/*
Plugin Name: Bamboo Layout
Plugin URI:  https://www.bamboomanchestser.uk/wordpress/bamboo-layout
Author:      Bamboo
Author URI:  https://www.bamboomanchester.uk
Version:     1.0.1
Description: Provides a number of shortcodes to enable custom page layouts.
*/
/************************************************************************************************************/

	function bamboo_layout_enqueue_scripts() {

		// Establish the base path.
		$path = plugins_url( '', __FILE__ );

		// Queue up jQuery.
		wp_enqueue_script( 'jquery' );

		// Queue up the gallery js.
    	wp_enqueue_script(
			'bamboo-gallery',
			$path . '/bamboo-layout.min.js',
			'jquery',
			null,
			true
		);

    	// Queue up the gallery css.
		wp_enqueue_style(
			'bamboo-gallery',
			$path . '/bamboo-layout.css',
			array(),
			null
		);

	}
	add_action( 'wp_enqueue_scripts', 'bamboo_layout_enqueue_scripts' );

/************************************************************************************************************/


	function bamboo_layout_shortcode_columns( $atts, $content=null ) {

        $classes = '';
        if( is_array( $atts ) ) {
            $class_array = $atts[0];
            $classes = implode( ' ', $atts );
        }

        $content = do_shortcode( $content );
        $html = "<div class=\"bamboo-columns $classes\">$content</div>";

        return $html;

	}
    add_shortcode( 'columns', 'bamboo_layout_shortcode_columns' );

/************************************************************************************************************/

	function bamboo_layout_shortcode_column( $atts, $content ) {

        $content = do_shortcode( $content );
        $html = "<div class=\"bamboo-column\">$content</div>";

        return $html;

    }
    add_shortcode( 'column', 'bamboo_layout_shortcode_column' );

/************************************************************************************************************/

    function bamboo_layout_shortcode_features( $atts, $content ) {

        $content = do_shortcode( $content );
        $html = "<div class=\"bamboo-features\">$content</div>";

        return $html;

    }
    add_shortcode( 'features', 'bamboo_layout_shortcode_features' );

/************************************************************************************************************/

	 function bamboo_layout_shortcode_feature( $atts, $content ) {

          $title = '';

          if ( isset( $atts['title'] ) )  {
               $title = $atts['title'];
          }

          $start_wrapper = "<div class=\"bamboo-feature-box\"  onclick=\"this.classList.toggle('clicked');\" >";
          $start_wrapper.= "<div class=\"content\">";
          $start_wrapper.= "<h3>$title</h3>";
          $start_wrapper.= "</div>";
          $start_wrapper.= "<div class=\"overlay\">";
          $end_wrapper = "</div></div>";

          return $start_wrapper . do_shortcode( $content ) . $end_wrapper;
    }
    add_shortcode( 'feature-box', 'bamboo_layout_shortcode_feature' );

/************************************************************************************************************/
?>
