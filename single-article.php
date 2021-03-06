<?php get_header() ?>
<div class="wrapper-inner essays">

	<div class="content">

		<?php while ( have_posts() ) : the_post(); ?>
			<?php
				global $post;
				$issues = get_the_terms( $post->ID, 'issuem_issue' );
				if(!empty($issues) && is_array($issues) )
					foreach( $issues as $issue ) {
						$lastSlug = $issue->slug;
					}
			?>

			<?php get_template_part( 'content', 'article');?>

		<?php endwhile; // end of the loop. ?>

		<?php comments_template(); ?>
	</div>


	<div class="sidebar">
		<div class="stamp small">
                <span class="icon-frame">
                    <span class="content">#<?php $data = get_issuem_issue_meta();
						echo $lastSlug; ?>
                    </span>
                </span>
		</div>

		<ul class="names">
			<li class="title"><a href="<?php echo get_permalink(12) ?>">Prólogo</a></li>
			<?php
			$line = '<li><a class="issuem_article_link" href="%URL%">%TITLE%, %BYLINE%</a></li>';
			echo get_issuem_articles_free_form("", $line);

			?>


		</ul>
	</div>    
</div>
<?php get_footer() ?>
