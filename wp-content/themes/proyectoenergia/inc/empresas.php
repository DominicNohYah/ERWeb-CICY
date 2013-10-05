<?php 

add_action( 'init', 'post_empresa');
 
 function post_empresa () {
		$labels = array(
			'name' => _x( 'Empresas', 'post type general name'),
		    'singular_name' => _x( 'Empresa', 'post type singular name'),
			'add_new' => _x( 'Añadir Empresa', 'Empresa'),
			'add_new_item' => sprintf( __( 'Añadir Empresa') ),
			'edit_item' => sprintf( __( 'Editar Empresa') ),
			'new_item' => sprintf( __( 'Nueva Empresa') ),
			'all_items' => sprintf( __( 'Empresas' ) ),
			'view_item' => sprintf( __( 'Ver Empresa' ) ),
			'search_items' => sprintf( __( 'Bucar Empresa') ),
			'not_found' =>  sprintf( __( 'No se encontraron empresas') ),
			'not_found_in_trash' => sprintf( __( 'No se encontro, está eliminado') ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Empresas' )

		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'Empresa' ),
			'capability_type' => 'post',
			'has_archive' => 'Empresas',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'menu_position' => 5,
			'menu_icon' => ''
		);
		register_post_type( 'empresa', $args );
	}

function my_taxonomies_Emp() {
	$labels = array(
		'name'              => _x( 'Categorias Empresas', 'taxonomy general name' ),
		'singular_name'     => _x( 'Categoria Empresa', 'taxonomy singular name' ),
		'search_items'      => __( 'Buscar Categoria' ),
		'all_items'         => __( 'Todas las categorias' ),
		'parent_item'       => __( 'Parent Product Category' ),
		'parent_item_colon' => __( 'Parent Product Category:' ),
		'edit_item'         => __( 'Editar Categoria Empresa' ), 
		'update_item'       => __( 'Actualizar Categoria Empresa' ),
		'add_new_item'      => __( 'Añadir Nueva Categoria Empresa' ),
		'new_item_name'     => __( 'Nueva Categoria Empresa' ),
		'menu_name'         => __( 'Categoria Empresas' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	register_taxonomy( 'product_category', 'Empresas', $args );
}
add_action( 'init', 'my_taxonomies_Emp', 0 );

function enter_title_here ( $title ) {
		if ( get_post_type() == 'empresa' ) {
			$title = __('Nombre de la Empresa');
		}
		return $title;
	}

add_filter( 'enter_title_here', 'enter_title_here');


add_action("admin_init", "admin_init");
 
function admin_init(){
  add_meta_box("Datos_Empresa", "Datos de la Empresa", "Datos_empresa", "portfolio", "side", "low");
}

function Datos_empresa(){
  global $post;
  $custom = get_post_custom($post->ID);
  $pagina_web = $custom["pagina_web"][0];
  ?>
  <label>Página web de la empresa</label>
  <input name="pagina_web" value="<?php echo $pagina_web; ?>"/>
  
<?php
   }

?>
