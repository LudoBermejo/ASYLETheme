<?php get_header() ?>
	<div class="wrapper-inner essays">
		<div class="sidebar">

		</div>
		<div class="content">
			<?php
			if ( have_posts() ):

			while(have_posts()): the_post(); ?>
			<div class="well">

						<h2>
							<?php the_title(); ?>, <?php the_author_posts_link()?>
							<small><?php the_date('F Y'); ?></small>
						</h2>

			</div>
			<?php endwhile;
			endif
			?>
		</div>
	</div>
<?php get_footer() ?>
