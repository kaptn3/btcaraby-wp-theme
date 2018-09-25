<h2 class="header-section">آخر الأخبار</h2>

<?php 
if ( have_posts() ) { ?>
<div id="ajax">
<?php	while ( have_posts() ) {
		the_post(); 
		get_template_part( 'loop-post/tumb-right' );
	} // end while ?>
	</div>

<?php } // end if
?>
<?php load_more_button(); ?>