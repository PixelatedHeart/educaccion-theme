<?php get_header(); ?>

<div class="container">
	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
			<h2><?php the_title(); ?></h2>

			<div class="entry">
				<?php 
					$url_video = get_post_meta($post->ID, 'youtube', true); 
				?>
					<br />
					<object width="718" height="427"><param name="movie" value="http://www.youtube.com/v/<?= $url_video; ?>?fs=1&amp;hl=es_ES"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?= $url_video; ?>?fs=1&amp;hl=es_ES" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="718" height="427"></embed></object>
				
								
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				
				<?php //Mostramos la ficha técnica del artículo 
					//$ano_produccion = get_post_meta($post->ID, 'Año de producción', true);
					//$nivel_educativo = get_post_meta($post->ID, 'Nivel Educativo', true);
					//$programa = get_post_meta($post->ID, 'Programa en el que se ha emitido', true);
					//$titulo_reportaje = get_post_meta($post->ID, 'Título del reportaje', true);
					$enlace_mediva = get_post_meta($post->ID, 'Enlace a Mediva', true);
				?>
				
				<div class="ficha-tecnica">
					<?php /*?><p>Título del reportaje: <strong><?php echo $titulo_reportaje; ?></strong></p>
					<p>Programa en el que se ha emitido: <strong><?php echo $programa; ?></strong></p><?php */ ?>
					<?php if($enlace_mediva != ''){ ?>
						<p><a href="<?php echo $enlace_mediva; ?>">Ver vídeo en MEDIVA</a></p>
					<?php } ?>
					<p>Área de conocimiento: <strong>
						<?php
							$i=0;
							$categories = get_the_category();
							foreach($categories as $category){
							
								$cat_id = $category->cat_ID;
								
								if(($cat_id != 3) && ($cat_id != 4) && ($cat_id != 5) && ($cat_id != 6) && ($cat_id != 7) && ($cat_id != 8) && ($cat_id != 9) && ($cat_id != 10) && ($cat_id != 11) && ($cat_id != 12)){
									
									if($i != 0)
										echo ', ';
									
									$category_link = get_category_link( $category->cat_ID );
									echo '<a href="'.$category_link.'">'.$category->cat_name.'</a>';
									
									$i++;
								}
							}
						?></strong>
					</p>
					<?php /*?>
					<p>Nivel educativo: <strong><?php echo $nivel_educativo; ?></strong></p>
					<p>Año de producción: <strong><?php echo $ano_produccion; ?></strong></p>
					<?php */?>
				</div>

				
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p id="tags">Tags: ', ', ', '</p>'); ?>
				
				<?php /* ?>
				<p class="postmetadata alt">
					<small>
						Artículo publicado el
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; *//* ?>
						<?php the_time('l, F jS, Y') ?> a las <?php the_time() ?>
						en las categorías <?php the_category(', ') ?>.
						Puedes seguir las respuestas a los comentarios en el feed <?php post_comments_feed_link('RSS 2.0'); ?>.

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							Puedes <a href="#respond">dejar un comentario</a>, o <a href="<?php trackback_url(); ?>" rel="trackback">trackback</a> de tu sitio web.

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							Los comentarios están cerrados, pero puedes hacer un <a href="<?php trackback_url(); ?> " rel="trackback">trackback</a> de tu sitio web.

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							Puedes ir al final y dejar un comentario. Los pingbacks están actualmente cerrados.

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							Los comentarios y los pingbacks están actualmente cerrados.

						<?php } edit_post_link('Edita este artículo','','.'); ?>

					</small>
				</p>
				<?php */ ?>

			</div>
		</div>

	<?php //comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Lo sentimos, no se he encontrado ningún artículo.</p>

<?php endif; ?>

	</div>
	
	<?php get_sidebar(); ?>


<?php get_footer(); ?>
