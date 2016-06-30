<?php get_header() ?>
<div class="wrapper-inner essays">

	<div class="content">
		<div class="well">


					<h2>
						<?php
						$issue = get_term_by( 'slug', get_active_issuem_issue(), 'issuem_issue' );

						echo get_issuem_issue_title($issue->term_id); ?>

						<small><!<?php //the_date('F Y'); ?></small>
					</h2>
					<blockquote>
						<?php echo get_issuem_issue_description($issue->term_id); ?>
					</blockquote>


		</div>
		<?php get_search_letters();?>

		<?php echo getAllIssues(); ?>
	</div>
	<div class="sidebar">
		<div class="stamp small">
                <span class="icon-frame">
                    <span class="content">#<?php echo get_active_issuem_issue(); ?>
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
