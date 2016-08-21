<?php
/**
 * Template Name: Product
 */

get_header(); ?>

<?php themedd_post_header(); ?>

<section class="container-fluid highlight add-ons pv-xs-4">
	<div class="container-fluid wrapper">
		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-4 grid-item">
				<div class="grid-item-inner">
					<?php if ( themedd_post_thumbnail() ) : ?>
					<div class="grid-item-image">
						<?php themedd_post_thumbnail(); ?>
					</div>
					<?php endif; ?>

					<div>
						<h3>
							<a href="<?php echo site_url( 'features' ); ?>">Features</a>
						</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>

					<footer>
                        <a href="<?php echo site_url( 'features' ); ?>">View features</a>
                    </footer>

				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-4 grid-item">
				<div class="grid-item-inner">
					<?php if ( themedd_post_thumbnail() ) : ?>
					<div class="grid-item-image">
						<?php themedd_post_thumbnail(); ?>
					</div>
					<?php endif; ?>

					<div>
						<h3>
							<a href="<?php echo site_url( 'integrations' ); ?>">Integrations</a>
						</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>

					<footer>
                        <a href="<?php echo site_url( 'integrations' ); ?>">View integrations</a>
                    </footer>

				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-4 grid-item">
				<div class="grid-item-inner">
					<?php if ( themedd_post_thumbnail() ) : ?>
					<div class="grid-item-image">
						<?php themedd_post_thumbnail(); ?>
					</div>
					<?php endif; ?>

					<div>
						<h3>
							<a href="<?php echo site_url( 'screenshots' ); ?>">Screenshots</a>
						</h3>

						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>

					<footer>
                        <a href="<?php echo site_url( 'screenshots' ); ?>">View screenshots</a>
                    </footer>

				</div>
			</div>



		</div>
	</div>
</section>

<?php get_footer();
