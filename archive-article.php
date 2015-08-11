<?php get_header() ?>

	<div class="wrapper-inner essays">
		<div class="sidebar">

		</div>
		<div class="content">

			<?php

			if ( have_posts() ):

			while(have_posts()): the_post(); ?>
				<?php get_template_part( 'content', 'article');?>
				<?php endwhile;
			endif
			?>
			<ul class="pagination text">
				<li><a href="#">A</a></li>
				<li><a href="#">B</a></li>
				<li><a href="#">C</a></li>
				<li><a href="#">D</a></li>
				<li><a href="#">E</a></li>
				<li><a href="#">F</a></li>
				<li><a href="#">G</a></li>
				<li><a href="#">H</a></li>
				<li><a href="#">I</a></li>
				<li><a href="#">J</a></li>
				<li><a href="#">K</a></li>
				<li><a href="#">L</a></li>
				<li><a href="#">M</a></li>
				<li><a href="#">N</a></li>
				<li><a href="#">Ñ</a></li>
				<li><a href="#">O</a></li>
				<li><a href="#">P</a></li>
				<li><a href="#">Q</a></li>
				<li><a href="#">R</a></li>
				<li><a href="#">S</a></li>
				<li><a href="#">T</a></li>
				<li><a href="#">U</a></li>
				<li><a href="#">V</a></li>
				<li><a href="#">W</a></li>
				<li><a href="#">X</a></li>
				<li><a href="#">Y</a></li>
				<li><a href="#">Z</a></li>
			</ul>

			<ul class="pagination number">
				<li><a href="#">#</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li><a href="#">5</a></li>
				<li><a href="#">6</a></li>
				<li><a href="#">7</a></li>
				<li><a href="#">8</a></li>
				<li><a href="#">9</a></li>
				<li><a href="#">10</a></li>
			</ul>
		</div>
	</div>
<?php get_footer() ?>
