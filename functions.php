<?php
/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Twenty Ten 1.0
 * @uses register_sidebar
 */
function twentyten_widgets_init() {
	
	// Zona para widgets debajo de la cabecera
	register_sidebar( array(
		'name' => __( 'Banner debajo cabecera', 'twentyten' ),
		'id' => 'banner-header-widget-area',
		'description' => __( 'Zona para widgets debajo de la cabecera', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	// Zona para widgets debajo de la cabecera
	register_sidebar( array(
		'name' => __( 'Menú cabecera', 'twentyten' ),
		'id' => 'menu-header-widget-area',
		'description' => __( 'Zona para widgets para menú de enlaces debajo de la cabecera', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	// Zona para widgets encima del footer (tercera columna)
	register_sidebar( array(
		'name' => __( 'Barra Lateral', 'twentyten' ),
		'id' => 'sidebar-left-widget-area',
		'description' => __( 'Zona para widgets en la barra lateral izquierda', 'twentyten' ),
		'before_widget' => '<li class="sidebar-left-widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Zona para widgets encima del footer (tercera columna)
	register_sidebar( array(
		'name' => __( 'Barra Lateral enlaces', 'twentyten' ),
		'id' => 'sidebar-links-widget-area',
		'description' => __( 'Zona para widgets en la barra lateral izquierda debajo de las categorías', 'twentyten' ),
		'before_widget' => '<li class="sidebar-left-widget">',
		'after_widget' => '</li>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Zona para widgets encima del footer (primera columna)
	register_sidebar( array(
		'name' => __( 'Footer a todo el ancho', 'twentyten' ),
		'id' => 'footer-widget-area',
		'description' => __( 'Zona para widgets debajo de los últimos vídeos de la portada', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	// Zona para widgets encima del footer (primera columna)
	register_sidebar( array(
		'name' => __( 'Footer primera columna', 'twentyten' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'Zona para widgets debajo del footer a todo el ancho (primera columna)', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	// Zona para widgets encima del footer (segunda columna)
	register_sidebar( array(
		'name' => __( 'Footer segunda columna', 'twentyten' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'Zona para widgets debajo del footer a todo el ancho (segunda columna)', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	
	// Zona para widgets encima del footer (tercera columna)
	register_sidebar( array(
		'name' => __( 'Footer tercera columna', 'twentyten' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'Zona para widgets debajo del footer a todo el ancho (tercera columna)', 'twentyten' ),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
}
/** Register sidebars by running twentyten_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'twentyten_widgets_init' );


function new_excerpt_length($length) {
	return 22;
}
add_filter('excerpt_length', 'new_excerpt_length');


//Función de nuestro excerpt personalizado de 100 caracteres, sin contar código.
function custom_excerpt($text, $long) {
	global $post;
	if ( '' != $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
	
		$text = strip_tags($text, '<strong><a><p><i><em>');
		$excerpt_length = $long;
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words)> $excerpt_length) {
			array_pop($words);
			array_push($words, '[...]');
			$text = implode(' ', $words);
		}
	}
	
	nl2br($text);
	
	return $text;
}


/*************************************************************************************************************************************************
// Menú en el panel de administración para que puedan elegir el blog del que se mostrará el sticky post o el último post
*************************************************************************************************************************************************/


function educaccion_admin_head() { ?>

<?php }

// VARIABLES

$themename = "Portada";
$shortname = "educaccion";
$manualurl = get_bloginfo('home');
$options = array();

add_option("educaccion_settings",$options);

$template_path = get_bloginfo('template_directory');

$layout_path = TEMPLATEPATH . '/layouts/'; 
$layouts = array();

$alt_stylesheet_path = TEMPLATEPATH . '/styles/';
$alt_stylesheets = array();

$functions_path = TEMPLATEPATH . '/functions/';

$mostrar_9[0] = 'Sí';
$mostrar_9[1] = 'No';

$mostrar_9_ids[0] = 'y';
$mostrar_9_ids[1] = 'n';

// THESE ARE THE DIFFERENT FIELDS

$options = array (

				array(	"name" => "Opciones del grid de vídeos de portada",
						"type" => "heading"),
	
				array(	"name" => "Mostrar los 9 grids: ",
						"desc" => "Si seleccionas 'Sí' en la portada aparecerá un grid de 3x3 módulos de noticias, en caso contrario, se mostrarán 6.<br /><br />",
						"id" => $shortname."_mostrar_9",
						"std" => "",
						"type" => "select",
						"options" => $mostrar_9,
						"ids" => $mostrar_9_ids),
						
				array(	"name" => "<br />Noticia destacada en portada (encima del vídeo principal de la portada)",
						"type" => "heading"),
	
				array(	"name" => "Título: ",
						"desc" => "",
						"id" => $shortname."_titulo",
						"std" => "",
						"type" => "text"),
			
				array(	"name" => "Enlace: ",
						"desc" => "Ejemplo: http://www.mecus.es",
						"id" => $shortname."_enlace",
						"std" => "",
						"type" => "text"),
						
				array(	"name" => "Texto: ",
						"desc" => "Texto resumen de la noticia destacada.",
						"id" => $shortname."_texto",
						"std" => "Escribe aquí el texto...",
						"type" => "textarea"),
				
				array(	"name" => "Imagen: ",
						"desc" => "<a href='http://educaccion.tv/wp-admin/media-new.php' target='blank'>Subir imagen</a> -> Sube la imagen a la galería multimedia y después pega la ruta en el cuadro de texto de arriba.<br />(Recuerda que para que la imagen no se deforme, debe tener unas dimensiones de <b>320px</b> de ancho por <b>200px</b>	 de alto.)",
						"id" => $shortname."_imagen",
						"std" => "",
						"type" => "text")								    								    
				);
				
				

// ADMIN PANEL

function educaccion_add_admin() {

	 global $themename, $options;
	
	if ( $_GET['page'] == basename(__FILE__) ) {	
        if ( 'save' == $_REQUEST['action'] ) {
	
                foreach ($options as $value) {
					if($value['type'] != 'multicheck'){
                    	update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
					}else{
						foreach($value['options'] as $mc_key => $mc_value){
							$up_opt = $value['id'].'_'.$mc_key;
							update_option($up_opt, $_REQUEST[$up_opt] );
						}
					}
				}

                foreach ($options as $value) {
					if($value['type'] != 'multicheck'){
                    	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } 
					}else{
						foreach($value['options'] as $mc_key => $mc_value){
							$up_opt = $value['id'].'_'.$mc_key;						
							if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); } 
						}
					}
				}
						
				header("Location: admin.php?page=functions.php&saved=true");								
			
			die;

		} else if ( 'reset' == $_REQUEST['action'] ) {
			delete_option('sandbox_logo');
			
			header("Location: admin.php?page=functions.php&reset=true");
			die;
		}

	}

add_menu_page($themename." Opciones", $themename." Opciones", 3, basename(__FILE__), 'educaccion_page');
}


function educaccion_page (){

		global $options, $themename, $manualurl;
		
		?>

<div class="wrap">

    			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">

						<h2><?php echo $themename; ?> Opciones</h2>

						<?php if ( $_REQUEST['saved'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?> se ha actualizado</div><?php } ?>
						<?php if ( $_REQUEST['reset'] ) { ?><div style="clear:both;height:20px;"></div><div class="warning"><?php echo $themename; ?> se ha reseteado</div><?php } ?>						
						
						<div style="clear:both;height:20px;"></div>  			
						
						<!--START: GENERAL SETTINGS-->
     						
     						<table class="maintable">
     							
							<?php foreach ($options as $value) { ?>
	
									<?php if ( $value['type'] <> "heading" ) { ?>
	
										<tr class="mainrow">
										<td class="titledesc" style="margin: -5px 0 0 0;vertical-align:text-top;"><?php echo $value['name']; ?></td>
										<td class="forminp">
		
									<?php } ?>		 
	
									<?php
										
										switch ( $value['type'] ) {
										
										case 'select':?>
										
											<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width: 100px">
	                						<?php $i=0; ?>
	                						<?php foreach ($value['options'] as $option) { ?>
	                							<?php $ids = $value['ids']; ?>
	                							<option<?php if ( get_settings( $value['id'] ) == $ids[$i]) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?> value="<?php echo $ids[$i]; ?>"><?php echo $option; ?></option>
	                							<?php $i++; ?>
	                						<?php } ?>
	            							</select><?php
		
										break;
										
										case 'text': 
										?>
											<input size="80" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
										
										<?php
										break;
										
										case 'textarea': 
										?>
											<textarea rows="6" cols="60" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea>
										<?php
										break;
										
										case "checkbox":
										
											if(get_settings($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; }?>
		            				
		            							<input type="checkbox" class="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> /> Actívalo si deseas mostrar los bloques 3, 6 y 9, es decir, los de la columna derecha.<?php
		
										break;
										
									
										
										case "heading":

									?>
									
										</table> 
		    							
		    									<h3 class="title"><?php echo $value['name']; ?></h3>
										
										<table class="maintable">
		
									<?php
										
										break;
										default:
										break;
									
									} ?>
	
									<?php if ( $value['type'] <> "heading" ) { ?>
	
										<?php if ( $value['type'] <> "checkbox" ) { ?><br /><?php } ?><span><?php echo $value['desc']; ?></span><br /><br />
										</td></tr>
	
									<?php } ?>		
									
							<?php } ?>	
							
							</table>	

							
							<p style="border:4px solid #0093D0;padding:10px;width:640px;">Nota: Si alguno de los campos está vacío, el bloque de la noticia destacada no aparecerá en portada.</p>
							
							<p class="submit">
								<input name="save" type="submit" value="Guardar cambios" />    
								<input type="hidden" name="action" value="save" />
							</p>							
							
							<div style="clear:both;"></div>		
						
						<!--END: GENERAL SETTINGS-->						
             
            </form>



</div><!--wrap-->

<div style="clear:both;height:20px;"></div>
 
 <?php

};

add_action('admin_menu', 'educaccion_add_admin');
add_action('admin_head', 'educaccion_admin_head');

?>