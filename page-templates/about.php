<?php
/**
 * Template Name: About
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
<header class="highlight page-header mb-xs-4<?php echo themedd_page_header_classes(); ?>">
	<h1 class="page-title"><?php echo get_the_title( get_the_ID() ); ?></h1>
</header>
<?php endwhile; ?>


<section class="container-fluid">
    <div class="wrapper">
		<div class="row mb-xs-4">

			<div class="col-xs-12 col-sm-6 col-md-4 mb-xs-2">
                <img class="profile" alt="Pippin Williamson" src="<?php echo get_stylesheet_directory_uri() . '/images/about/pippin-williamson.jpg'; ?>">
				<h2>Pippin Williamson</h2>
				<p class="about-details">
					<a href="http://pippinsplugins.com" target="_blank">pippinsplugins.com</a><br/>
					<a href="https://twitter.com/pippinsplugins" class="twitter-follow-button" data-show-count="false">Follow @pippinsplugins</a>

				</p>
				<p>Pippin Williamson is an avid WordPress plugin developer from Hutchinson, Kansas and the lead developer for AffiliateWP. Along with AffiliateWP, Pippin is the founder of Easy Digital Downloads, a complete e-commerce plugin for selling digital products through WordPress, and Restrict Content Pro, a plugin for managing and selling memberships to premium content.</p>
				<p>Beyond the world of WordPress, Pippin is a devoted father and husband. He thoroughly enjoys brewing coffee varieties from around the world, indulging in craft beers, and riding his bicycle from point A to point B whenever possible.</p>
			</div>

            <div class="col-xs-12 col-sm-6 col-md-4 mb-xs-2">
                <img class="profile" alt="Andrew Munro" src="<?php echo get_stylesheet_directory_uri() . '/images/about/andrew-munro.jpg'; ?>">
                <h2>Andrew Munro</h2>

                <p class="about-details">
					<a href="http://sumobi.com" target="_blank">sumobi.com</a><br/>
					<a href="https://twitter.com/sumobi_" class="twitter-follow-button" data-show-count="false">Follow @sumobi_</a>

                </p>

                <p>Andrew co-founded AffiliateWP with Pippin in early 2014 after joining the Easy Digital Downloads crew in 2013 as a contributing developer, and authoring over 20 free and commercial EDD extensions. Bursting at the seams with ideas, he is constantly dreaming-up and executing new features and add-ons for AffiliateWP.</p>

                <p>Andrew is a self-taught web designer/developer, and is the design mastermind behind the AffiliateWP, Restrict Content Pro and Pippin’s Plugins websites.</p>

                <p>Hailing from New Zealand (Middle Earth) Andrew prides himself on efficiency, getting exercise as he codes from his trusty treadmill desk. His extreme productivity is fueled by walking up to 20,000 steps a day, and large servings of Groove Salad radio.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 mb-xs-2">
                <img class="profile" alt="Rami Abraham" src="<?php echo get_stylesheet_directory_uri() . '/images/about/rami-abraham.jpg'; ?>">
				<h2>Rami Abraham</h2>

				<p class="about-details">
					<a href="http://ramiabraham.com" target="_blank">ramiabraham.com</a><br/>
					<a href="https://twitter.com/ramiabraham" class="twitter-follow-button" data-show-count="false">Follow @ramiabraham</a>

				</p>

				<p>Rami is a WordPress developer that’s been building with WordPress since version 2.8. Prior to using WordPress, he built sites with static html, and a variety of server-side languages. He loves making cool things with AffiliateWP.</p>

				<p>JavaScript and bad dad jokes are what he knows best.</p>

				<p>He helps organize WordCamp Lancaster, and is an adequate Lego craftsman.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 mb-xs-2">
                <img class="profile" alt="Lisa Gibson" src="<?php echo get_stylesheet_directory_uri() . '/images/about/lisa-gibson.jpg'; ?>">
				<h2>Lisa Gibson</h2>

				<p class="about-details">
					<a href="http://wordmaid.com" target="_blank">wordmaid.com</a><br/>
					<a href="https://twitter.com/wordmaid" class="twitter-follow-button" data-show-count="false">Follow @wordmaid</a>

				</p>
				<p>After spending 8 years in Media Advertising and Marketing, Lisa dipped her toe into the WordPress industry in 2014. In 2015 she took the leap, leaving Advertising behind to hone her red-penning and writing skills as The WordMaid, and to become part of the AffiliateWP team. Lisa spends her day sweeping up support tickets, developing docs, and crafting content for AffiliateWP.</p>

                <p>Also part of the wider Easy Digital Downloads team, Lisa occasionally helps out with support for Alf’s mate Edd, and lends her eagle eye for content editing whenever needed.</p>

                <p>When she’s not sitting - or standing - at her computer, Lisa’s loves are: taking her pooch Jaco for walks through the bush or along the beaches in her home town (Auckland, New Zealand); tapping along furiously to (mainly rock) music, pretending she’s the next Steve Gadd or Dave Grohl; and spending time with friends and family over a tipple or two.</p>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-4 mb-xs-2">

				<img class="profile" alt="Michael Beil" src="<?php echo get_stylesheet_directory_uri() . '/images/about/michael-beil.jpg'; ?>">
				<h2>Michael Beil</h2>

				<p class="about-details">
					<a href="http://michaelbeil.com/" target="_blank">michaelbeil.com</a><br/>
					<a href="https://twitter.com/michaelbeil" class="twitter-follow-button" data-show-count="false">Follow @michaelbeil</a>

				</p>

				<p>Michael Beil is an avid WordPress user. He began his WordPress journey as a side job when a friend asked for some help in 2011, and he has not looked back since. As part of the AffiliateWP crew, he helps with support, testing, and sharing GIFs.</p>

                <p>When Michael needs to get from point A to point B, he hits a button that activates a rocket on his wheelchair.</p>

                <p>Michael is from the land of cheese and lakes, that is Madison, Wisconsin, where he enjoys playing hammered dulcimer, sailing, coffee brewing, and hanging out with his wife.</p>

            </div>

            <div class="col-xs-12 col-sm-6 col-md-4">
                <img class="profile" alt="Drew Jaynes" src="<?php echo get_stylesheet_directory_uri() . '/images/about/drew-jaynes.jpg'; ?>">
				<h2>Drew Jaynes</h2>

				<p class="about-details">
					<a href="http://werdswords.com" target="_blank">werdswords.com</a><br/>
					<a href="https://twitter.com/DrewAPicture" class="twitter-follow-button" data-show-count="false">Follow @DrewAPicture</a>

				</p>

				<p>Drew Jaynes is a WordPress core developer, docs enthusiast, and plugin developer who hails from Arvada, Colorado. Drew has been developing with WordPress since 2008, initially contracting at a university and later working as a developer for an elite WordPress agency before joining the team at AffiliateWP.</p>

                <p>Drew's contributions to WordPress are vast and have spanned the core, docs, meta, support, and community teams to name a few. He’s been contributing to WordPress since version 3.3 and even led the 4.2 release. He currently serves as the maintainer for core inline documentation.</p>

                <p>In his spare time – other than doing WordPress when he's taking a break from WordPress – Drew likes to travel by plane, train, or automobile just about anywhere, but more often than not it's to the nearby Rocky Mountains for a variety of outdoor activities. Drew has even been known to stop and have a beer with Pippin when he's cruising through Kansas on his way to the great unknown.</p>

            </div>


		</div>
    </div>
</section>

<?php
get_footer();
