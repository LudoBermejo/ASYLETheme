<?php get_header() ?>

<?php
$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<div class="wrapper-inner author">
	<div class="sidebar">
		<?php echo get_authors_list("", "names", $curauth->display_name); ?>

	</div>
	<div class="content">
		<div class="stamp small">
                            <span class="icon-frame">
                                <span class="content">
                                    <?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'issuem_magazine_author_bio_avatar_size', 115 ) );?>
                                </span>
                            </span>
		</div>

		<h2><?php echo $curauth->display_name; ?></h2>
		<?php

			echo wpautop($curauth->description);


		?>

		<div class='list_of_articles'>
			<h2>Artículos del autor</h2>
			<?php getListOfArticlesByAuthor($curauth->ID, "names");?>
		</div>

	</div>


<?php
?>
</div>
<?php get_footer() ?>
