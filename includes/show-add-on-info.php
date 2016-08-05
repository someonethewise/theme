<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'Show_Plugin_Info' ) ) {

	final class Show_Plugin_Info {

		/**
		 * @var Show_Plugin_Info The one true Show_Plugin_Info
		 * @since 1.0
		 */
		private static $instance;

		private static $plugin_dir;

		/**
		 * Main Show_Plugin_Info Instance
		 *
		 * Insures that only one instance of Show_Plugin_Info exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @since 1.0
		 * @static
		 * @staticvar array $instance
		 * @return The one true Show_Plugin_Info
		 */
		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Show_Plugin_Info ) ) {
				self::$instance = new Show_Plugin_Info;

				self::$plugin_dir = plugin_dir_path( __FILE__ );

			}

			return self::$instance;

		}

		public function get_info( $slug = '', $field = '' ) {

			/**
			 * Check if slug exists
			 */
			if ( ! $slug ) {
				return false;
			}

			/**
			 * Check if field exists
			 * Return value based on the field attribute
			 */

			if ( ! $field ) {
				return false;
			} else {

				// Sanitize attributes
				$slug = sanitize_title( $slug );
				$field = sanitize_title( $field );

				// Create a empty array with variable name different based on plugin slug
				$transient_name = 'spi_' . $slug;

				/**
				 * Check if transient with the plugin data exists
				 */
				$pp_get_info = get_transient( $transient_name );

				if ( empty( $pp_get_info ) ) {

					require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
					$pp_get_info = plugins_api( 'plugin_information', array( 'slug' => $slug, 'fields' => array( 'active_installs' => true, 'sections' => true ) ) );

					// Check for errors with the data returned from WordPress.org
					if ( ! $pp_get_info || is_wp_error( $pp_get_info ) ) {
						return false;
					}

					// Set a transient with the plugin data
					// Use Options API with auto update cron job in next version.
					set_transient( $transient_name, $pp_get_info, 1 * HOUR_IN_SECONDS );

				}

			//	var_dump( $pp_get_info->sections['changelog'] );

				if ( $field == "downloaded" ) {
		        	return $pp_get_info->downloaded;
		    	}

				if ( $field == "name" ) {
		        	return $pp_get_info->name;
		    	}

				if ( $field == "slug" ) {
		        	return $pp_get_info->slug;
		    	}

				if ( $field == "version" ) {
		        	return $pp_get_info->version;
		    	}

				if ( $field == "author" ) {
		        	return $pp_get_info->author;
		    	}

				if ( $field == "author_profile" ) {
		        	return $pp_get_info->author_profile;
		    	}

				if ( $field == "last_updated" ) {
		        	return $pp_get_info->last_updated;
		    	}

				if ( $field == "download_link" ) {
		        	return $pp_get_info->download_link;
		    	}

				if ( $field == "requires" ) {
					return $pp_get_info->requires;
				}

				if ( $field == "tested" ) {
					return $pp_get_info->tested;
				}

				if ( $field == "num_ratings" ) {
					return $pp_get_info->num_ratings;
				}

				if ( $field == "added" ) {
					return $pp_get_info->added;
				}

				if ( $field == "active_installs" ) {
					return $pp_get_info->active_installs;
				}

				if ( $field == "changelog" ) {
					return $pp_get_info->sections['changelog'];
				}


          		/**
                 * rating outputs a percentage, to get a number of stars like in the WP Plugin Repository, you need to divide the output by 20:
                 *
                 * $percentage = do_shortcode( '[mpi slug="' . $slug . '" field="rating"]' );
                 * $stars = $percentage / 20;
                 * printf( __( 'Rating: %s out of 5 stars', 'textdomain' ), $stars );
                 *
                 */

                if ( $field == "rating" ) {
                    return $pp_get_info->rating;
                }

		    }

		}

	}

}

function show_plugin_info() {

	if ( ! function_exists( 'show_plugin_info' ) ) {
		return;
	}

	return Show_Plugin_Info::instance();
}
add_action( 'plugins_loaded', 'show_plugin_info', 100 );
