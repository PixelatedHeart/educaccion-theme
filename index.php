<?php get_header(); ?>

<?php global $post; ?>

<div class="container">
	<div id="content" class="narrowcolumn">
	
	<?php								
		if ( is_active_sidebar( 'banner-header-widget-area' ) ) : ?>
			<div class="banner-debajo-cabecera">
				<?php dynamic_sidebar( 'banner-header-widget-area' ); ?>
			</div><?php
		else:
		endif;								
	?>
	
	
	<?php 
		$titulo = get_option('educaccion_titulo'); 
		$enlace = get_option('educaccion_enlace'); 
		$texto = get_option('educaccion_texto'); 
		$imagen = get_option('educaccion_imagen'); 
	?>
	<?php if($titulo && $enlace && $texto && $imagen): ?>
		<div id="not-destacada">
			<div class="imagen-not-destacada"><a href="<?php echo $enlace; ?>" target="_blank"><img src="<?php echo $imagen; ?>" alt="<?php echo $titulo; ?>" title="<?php echo $titulo; ?>" /></a></div>
			<div class="titulo-not-destacada"><h2><a href="<?php echo $enlace; ?>" rel="bookmark" title="Permanent Link to <?php echo $titulo; ?>" target="_blank"><?php echo $titulo; ?></a></h2></div>
			<div class="texto-not-destacada"><p><?php echo $texto; ?></p></div>		
		</div>
	<?php endif; ?>
	
	
<?php query_posts('cat=3&posts_per_page=1'); ?>
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php if (in_category('portada-destacado')) : ?>
			<div class="post" id="post-<?php the_ID(); ?>" style="height:348px;*margin-bottom:15px;">
				<div class="post-destacado">
					<div class="titulo-destacado"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>

					<div class="entry" style="padding-right:10px;color:white;">
						<div style="float:left; padding-right:10px;">
							
								<?php 
								$url_video = get_post_meta($post->ID, 'youtube', true); 
								?>
								<object width="475" height="295"><param name="movie" value="http://www.youtube.com/v/<?= $url_video; ?>?fs=1&amp;hl=es_ES"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?= $url_video; ?>?fs=1&amp;hl=es_ES" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="475" height="295"></embed></object>		
						</div>
				
					<?php 
						$content = get_the_content();
						echo custom_excerpt($content, 100); 
					?>
					</div>

				</div><!--lightblue-->
			</div>
			<br />
		<?php endif; ?>
		<?php endwhile; ?>
		<?php endif; ?>


	<?php
		$num_cat = 4;
		
		//Mostramos hasta la categoría 9 (la del bloque número 6) si lo han elegido en la página de opciones de la portada en el panel de administración
		$mostrar_9 = get_option('educaccion_mostrar_9');
		if($mostrar_9 == 'y'):
			$categorias = 12;
		else:
			$categorias = 9;
		endif;
		
		
		while($num_cat <= $categorias){
			$query = 'cat='.$num_cat.'&posts_per_page=1';
			?>

			<?php query_posts($query); ?>
			<?php if (have_posts()) : ?>
			
				<?php if(($num_cat == 4) || ($num_cat == 7) || ($num_cat == 10)): ?>
						<div class="fila-portada">
				<?php endif; ?>
			
				<?php while (have_posts()) : the_post(); ?>
				<div class="modulos" id="post-<?php the_ID(); ?>">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>

					<div class="entry">
						<?php 
							$url_video_bloque = get_post_meta($post->ID, 'youtube', true); ?>
							<object width="200" height="140"><param name="movie" value="http://www.youtube.com/v/<?= $url_video_bloque; ?>?fs=1&amp;hl=es_ES"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/<?= $url_video_bloque; ?>?fs=1&amp;hl=es_ES" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="200" height="140"></embed></object>

						<?php 
								the_excerpt();  
						?>
					</div>
				</div>
				<?php endwhile; ?>
				
				<?php if(($num_cat == 6) || ($num_cat == 9) || ($num_cat == 12)): ?>
						</div>
				<?php endif; ?>
				
			<?php endif; ?>
			<?php $num_cat++;
		}//while($num_bloque <= 12) ?>
	
		<?php								
		if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
			<div class="footer-widget-area">
				<?php dynamic_sidebar( 'footer-widget-area' ); ?>
			</div><?php
		else:
		endif;								
		?>
	
		<div class="todo-el-ancho">
			<?php								
			if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
				<div class="first-footer-widget-area">
					<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
				</div><?php
			else:
			endif;								
			?>
			<?php								
			if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
				<div class="second-footer-widget-area">
					<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
				</div><?php
			else:
			endif;								
			?>
			<?php								
			if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
				<div class="third-footer-widget-area">
					<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
				</div><?php
			else:
			endif;								
			?>
	</div>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>

</div> <!-- container -->