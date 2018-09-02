<?php get_header(); ?>

<div class="container">
  <div class="row page-wrapper">
    <div class="col-12 col-md-8 single-page">
      <?php if ( have_posts() ) while ( have_posts() ) : the_post();
      $categories = get_the_category($post->ID);
      get_template_part('loop-post/post-full');
      endwhile; ?>
		
		<script>
(function (d, s, wid, eid) {
var scriptId = "spk-script-" + eid;
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(scriptId)) return;
js = d.createElement(s); js.scriptId = scriptId;js.async = 1
js.src = "//crawler.speakol.com/sdk/speakol-widget.js?wid="+wid+"&eid="+ eid
fjs.parentNode.insertBefore(js, fjs);
})(document, "script", "wi-1034","spk-wi-1034");
</script>
<!-- Speakol will render the widget here -->
<div class="speakol-widget" id="spk-wi-1034"></div>
	
      <section class="post__comments">
        <?php if (comments_open() || get_comments_number()) comments_template('', true); ?>
      </section>
    </div><!-- end col -->
    <?php get_sidebar(); ?>
  </div>
</div>

<?php get_footer(); ?>