<?php
/**
 * @package IssueM Magazine Theme
 * @since 1.0.0
 */
?>


		<h2>
			<?php the_title(); ?>, <?php the_author_posts_link()?>
			<small><?php the_date('F Y'); ?></small>

		</h2>

		<?php the_content();?>
