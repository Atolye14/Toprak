<?php while (have_posts()) : the_post(); $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'post-image'); ?>


<?php if ( has_post_thumbnail() ) {  ?>
<div class="col-sm-6 col-md-4">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<figure>
				<img src="<?php echo $thumbnail[0]; ?>" alt="" class="img-responsive" style="width:100%;" />
				<figcaption>
					<div class="row">
						<div class="col-xs-9">
							<h1><?php the_title(); ?></h1>
							<hr/>
							<small>kartı görmek için tıklayın</small>
							</div>
							<div class="col-xs-3">
								<figure>
									<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/incele.png" title="" />
								</figure>
							</div>
						</div>
					</figcaption>
			</figure>
			</a>
		</div>

<?php } ?>

<?php endwhile; ?>