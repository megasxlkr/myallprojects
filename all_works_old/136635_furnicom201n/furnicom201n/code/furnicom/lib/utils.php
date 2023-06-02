<?php
/**
 * Theme wrapper
 *
 * @link http://scribu.net/wordpress/theme-wrappers.html
 */




/* Style Background */
function furnicom_style_bg(){ 
	
	$img =  furnicom_options()->getCpanelValue('bg_img');
	$color = furnicom_options()->getCpanelValue('bg_color');
	$repeat = furnicom_options()->getCpanelValue('bg_repeat');
	$layout = furnicom_options()->getCpanelValue('layout');
	$bg_image = furnicom_options()->getCpanelValue('bg_box_img');
	$img = isset($img) ? $img : '';
	$color = isset($color) ? $color : '';
	$repeat = isset($repeat) ? 'repeat' : 'no-repeat';
	
	if ( !empty($img) && strpos($img, 'bg-demo') === false ) {
		
	} elseif ( !empty($img) && strpos($img, 'bg-demo') == 0 ) {
		$img = get_template_directory_uri() . '/assets/img/' . $img . '.png';
	}
	
	if (strpos($color, '#') != 0) {
		$color = '#' . $color;
	} 
	if( $img != '' || $layout == 'boxed' ){
	?>

	<style>
		body{
			background-image: url('<?php echo esc_attr( $img ); ?>') !important;
			background-color: <?php echo esc_html( $color ); ?> !important;
			background-repeat: <?php echo esc_html( $repeat ); ?> !important;
			<?php if( $layout == 'boxed' ){ ?>
				background-image: url('<?php echo esc_attr( $bg_image ); ?>') !important;
				background-position: top center; 
				background-attachment: fixed;					
			<?php }	?>
		}
	</style>
	
	<?php 
	}
	return '';
}
add_filter('wp_head', 'furnicom_style_bg');

/*
** Function Get datetime blog 
*/
function function_get_time(){
	global $post;
	echo '<span class="entry-date latest_post_date">
		<span class="day-time">'. get_the_time( 'd', $post->ID ) . '</span>
		<span class="month-time">'. get_the_time( 'M', $post->ID ) . '</span>
	</span>';
}

/*
** Get content page by ID
*/
function get_the_content_by_id( $post_id ) {
  $page_data = get_page( $post_id );
  if ($page_data) {
    $content = apply_filters( 'the_content', $page_data->post_content );
		return $content;
  }
  else return false;
}

/*
** Get Social share
*/
function furnicom_get_social() {
	global $post;
	
	$social = furnicom_options()->getCpanelValue('social-share');	
	
	if ( !$social ) return false;
	ob_start();
?>
	<div class="social-share">
		<div class="title-share"><?php esc_html_e( 'Share this:','furnicom' ) ?></div>
		<div class="wrap-content">
			<a href="http://www.facebook.com/share.php?u=<?php echo get_permalink( $post->ID ); ?>&title=<?php echo get_the_title( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-facebook"></i></a>
			<a href="http://twitter.com/home?status=<?php echo get_the_title( $post->ID ); ?>+<?php echo get_permalink( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-twitter"></i></a>
			<a href="https://plus.google.com/share?url=<?php echo get_permalink( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a>
			<a href="https://dribbble.com/<?php echo get_permalink( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-dribbble"></i></a>
			<a href="https://www.instagram.com/?hl=en=<?php echo get_permalink( $post->ID ); ?>" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-instagram"></i></a>
		</div>
	</div>
<?php 
	$data = ob_get_clean();
	echo $data;

}

/**
 * Page titles
 */
function furnicom_title() {
	if (is_home()) {
		if (get_option('page_for_posts', true)) {
			echo get_the_title(get_option('page_for_posts', true));
		} else {
			esc_html_e('Latest Posts', 'furnicom');
		}
	} elseif (is_archive()) {
		$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
		if ($term) {
			echo $term->name;
		} elseif (is_post_type_archive()) {
			echo get_queried_object()->labels->name;
		} elseif (is_day()) {
			printf(esc_html__('Daily Archives: %s', 'furnicom'), get_the_date());
		} elseif (is_month()) {
			printf(esc_html__('Monthly Archives: %s', 'furnicom'), get_the_date('F Y'));
		} elseif (is_year()) {
			printf(esc_html__('Yearly Archives: %s', 'furnicom'), get_the_date('Y'));
		} elseif (is_author()) {
			printf(esc_html__('Author Archives: %s', 'furnicom'), get_the_author());
		} else {
			single_cat_title();
		}
	} elseif (is_search()) {
		printf(sprintf( __('Search Results for <small>%s</small>', 'furnicom'), get_search_query() ));
	} elseif (is_404()) {
		esc_html_e('Not Found', 'furnicom');
	} else {
		the_title();
	}
}

/**
 * Return WordPress subdirectory if applicable
 */
function wp_base_dir() {
	preg_match('!(https?://[^/|"]+)([^"]+)?!', site_url(), $matches);
	if (count($matches) === 3) {
		return end($matches);
	} else {
		return '';
	}
}

/**
 * Opposite of built in WP functions for trailing slashes
 */
function leadingslashit($string) {
	return '/' . unleadingslashit($string);
}

function unleadingslashit($string) {
	return ltrim($string, '/');
}

function add_filters($tags, $function) {
	foreach($tags as $tag) {
		add_filter($tag, $function);
	}
}

function is_element_empty($element) {
	$element = trim($element);
	return empty($element) ? false : true;
}

function is_customize(){
	return isset($_POST['customized']) && ( isset($_POST['customize_messenger_chanel']) || isset($_POST['wp_customize']) );
}

function is_ajax_ya(){
	return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

/**
 * Create HTML list checkbox of nav menu items.
 */

class Furnicom_Menu_Checkbox extends Walker_Nav_Menu{
	
	private $menu_slug;	
	public function __construct( $menu_slug = '') {
		$this->menu_slug = $menu_slug;
	}
	
	public function init($items, $args = array()) {
		$args = array( $items, 0, $args );
		
		return call_user_func_array( array($this, 'walk'), $args );
	}
	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';	
		$item_output = '<label for="' . $this->menu_slug . '-' . $item->post_name . '-' . $item->ID . '">';
		$item_output .= '<input type="checkbox" name="' . $this->menu_slug . '_'  . $item->post_name .  '_' . $item->ID . '" ' . $this->menu_slug.$item->post_name.$item->ID . ' id="' . $this->menu_slug . '-'  . $item->post_name . '-' . $item->ID . '" /> ' . $item->title;
		$item_output .= '</label>';

		$output .= $item_output;
	}
	
	public function is_menu_item_active($menu_id, $item_ids) {
		global $wp_query;

		$queried_object = $wp_query->get_queried_object();
		$queried_object_id = (int) $wp_query->queried_object_id;
	
		$items = wp_get_nav_menu_items($menu_id);
		$items_current = array();
		$possible_object_parents = array();
		$home_page_id = (int) get_option( 'page_for_posts' );
		
		if ( $wp_query->is_singular && ! empty( $queried_object->post_type ) && ! is_post_type_hierarchical( $queried_object->post_type ) ) {
			foreach ( (array) get_object_taxonomies( $queried_object->post_type ) as $taxonomy ) {
				if ( is_taxonomy_hierarchical( $taxonomy ) ) {
					$terms = wp_get_object_terms( $queried_object_id, $taxonomy, array( 'fields' => 'ids' ) );
					if ( is_array( $terms ) ) {
						$possible_object_parents = array_merge( $possible_object_parents, $terms );
					}
				}
			}
		}
		
		foreach ($items as $item) {
			
			if (key_exists($item->ID, $item_ids)) {
				$items_current[] = $item;
			}
		}
		
		foreach ($items_current as $item) {
			
			if ( ($item->object_id == $queried_object_id) && (
						( ! empty( $home_page_id ) && 'post_type' == $item->type && $wp_query->is_home && $home_page_id == $item->object_id ) ||
						( 'post_type' == $item->type && $wp_query->is_singular ) ||
						( 'taxonomy' == $item->type && ( $wp_query->is_category || $wp_query->is_tag || $wp_query->is_tax ) && $queried_object->taxonomy == $item->object )
					)
				)
				return true;
			elseif ( $wp_query->is_singular &&
					'taxonomy' == $item->type &&
					in_array( $item->object_id, $possible_object_parents ) ) {
				return true;
			} elseif ( 'custom' == $item->object ) {
				$_root_relative_current = untrailingslashit( $_SERVER['REQUEST_URI'] );
				$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_root_relative_current );
				$raw_item_url = strpos( $item->url, '#' ) ? substr( $item->url, 0, strpos( $item->url, '#' ) ) : $item->url;
				$item_url = untrailingslashit( $raw_item_url );
				$_indexless_current = untrailingslashit( preg_replace( '/index.php$/', '', $current_url ) );
	
				if ( $raw_item_url && in_array( $item_url, array( $current_url, $_indexless_current, $_root_relative_current ) ) )
					return true;
			}
		}
		
		return false;
	}
}
/**
 * Check widget display
 * */
function check_wdisplay ($widget_display){
	$widget_display = json_decode(json_encode($widget_display), true);
	$Furnicom_Menu_Checkbox = new Furnicom_Menu_Checkbox;
	if ( isset($widget_display['display_select']) && $widget_display['display_select'] == 'all' ) {
		return true;
	}else{
	if ( in_array( 'sitepress-multilingual-cms/sitepress.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) { 
		if(  isset($widget_display['display_language']) && strcmp($widget_display['display_language'], ICL_LANGUAGE_CODE) != 0  ){
			return false;
		}
	}
	if ( isset($widget_display['display_select']) && $widget_display['display_select'] == 'if_selected' ) {
		
		if (isset($widget_display['checkbox'])) {
			
			if (isset($widget_display['checkbox']['users'])) {
				global $user_ID;
				
				foreach ($widget_display['checkbox']['users'] as $key => $value) {
					
					if ( ($key == 'login' && $user_ID) || ($key == 'logout' && !$user_ID) ){
						
						if (isset($widget_display['checkbox']['general'])) {
							foreach ($widget_display['checkbox']['general'] as $key => $value) {
								$is = 'is_'.$key;
								if ( $is() === true ) return true;
							}
						}
						
						if (isset($widget_display['taxonomy-slugs'])) {
							
							$taxonomy_slugs = preg_split('/[\s,]/', $widget_display['taxonomy-slugs']);
							foreach ($taxonomy_slugs as $slug) {is_post_type_archive('product_cat');
								if (!empty($slug) && is_tax($slug) === true) {
									return true;
								}
							}
						
						}
						
						if (isset($widget_display['post-type'])) {
							$post_type = preg_split('/[\s,]/', $widget_display['post-type']);
							
							foreach ($post_type as $type) {
								if(is_archive()){
									if (!empty($type) && is_post_type_archive($type) === true) {
										return true;
									}
								}
								
								if($type!=PRODUCT_TYPE)
								{
									if(!empty($type) && $type==PRODUCT_DETAIL_TYPE && is_single() && get_post_type() != 'post'){
										return true;
									}else if (!empty($type) && is_singular($type) === true) {
										return true;
									}
									
								}	
							}
						}
						
						if (isset($widget_display['catid'])) {
							$catid = preg_split('/[\s,]/', $widget_display['catid']);
							foreach ($catid as $id) {
								if (!empty($id) && is_category($id) === true) {
									return true;
								}
							}
								
						}
						
						if (isset($widget_display['postid'])) {
							$postid = preg_split('/[\s,]/', $widget_display['postid']);
							foreach ($postid as $id) {
								if (!empty($id) && (is_page($id) === true || is_single($id) === true) ) {
									return true;
								}
							}
						
						}
						
						if (isset($widget_display['checkbox']['menus'])) {
							
							foreach ($widget_display['checkbox']['menus'] as $menu_id => $item_ids) {
								
								if ( $Furnicom_Menu_Checkbox->is_menu_item_active($menu_id, $item_ids) ) return true;
							}
						}
					}
				}
			}
			
			return false;
			
		} else return false ;
		
	} elseif ( isset($widget_display['display_select']) && $widget_display['display_select'] == 'if_no_selected' ) {
		
		if (isset($widget_display['checkbox'])) {
			
			if (isset($widget_display['checkbox']['users'])) {
				global $user_ID;
				
				foreach ($widget_display['checkbox']['users'] as $key => $value) {
					if ( ($key == 'login' && $user_ID) || ($key == 'logout' && !$user_ID) ) return false;
				}
			}
			
			if (isset($widget_display['checkbox']['general'])) {
				foreach ($widget_display['checkbox']['general'] as $key => $value) {
					$is = 'is_'.$key;
					if ( $is() === true ) return false;
				}
			}

			if (isset($widget_display['taxonomy-slugs'])) {
				$taxonomy_slugs = preg_split('/[\s,]/', $widget_display['taxonomy-slugs']);
				foreach ($taxonomy_slugs as $slug) {
					if (!empty($slug) && is_tax($slug) === true) {
						return false;
					}
				}
			
			}
			
			if (isset($widget_display['post-type'])) {
				$post_type = preg_split('/[\s,]/', $widget_display['post-type']);
				
				foreach ($post_type as $type) {
					if(is_archive()){
						if (!empty($type) && is_post_type_archive($type) === true) {
							return true;
						}
					}
					
					if($type!=PRODUCT_TYPE)
					{
						if(!empty($type) && $type==PRODUCT_DETAIL_TYPE && is_single() && get_post_type() != 'post'){
							return true;
						}else if (!empty($type) && is_singular($type) === true) {
							return true;
						}
						
					}	
				}
			}
			
			
			
			if (isset($widget_display['catid'])) {
				$catid = preg_split('/[\s,]/', $widget_display['catid']);
				foreach ($catid as $id) {
					if (!empty($id) && is_category($id) === true) {
						return false;
					}
				}
					
			}
			
			if (isset($widget_display['postid'])) {
				$postid = preg_split('/[\s,]/', $widget_display['postid']);
				foreach ($postid as $id) {
					if (!empty($id) && (is_page($id) === true || is_single($id) === true)) {
						return false;
					}
				}
			
			}
			
			if (isset($widget_display['checkbox']['menus'])) {
							
				foreach ($widget_display['checkbox']['menus'] as $menu_id => $item_ids) {
					
					if ( $Furnicom_Menu_Checkbox->is_menu_item_active($menu_id, $item_ids) ) return false;
				}
			}			
		} else return false ;
	}
	}
	return true ;
}


/**
 *  Is active sidebar
 * */
function is_active_sidebar_Furnicom($index) {
	global $wp_registered_widgets;
	
	$index = ( is_int($index) ) ? "sidebar-$index" : sanitize_title($index);
	$sidebars_widgets = wp_get_sidebars_widgets();
	if (!empty($sidebars_widgets[$index])) {
		foreach ($sidebars_widgets[$index] as $i => $id) {
			$id_base = preg_replace( '/-[0-9]+$/', '', $id );
			
			if ( isset($wp_registered_widgets[$id]) ) {
				$widget = new WP_Widget($id_base, $wp_registered_widgets[$id]['name']);

				if ( preg_match( '/' . $id_base . '-([0-9]+)$/', $id, $matches ) )
					$number = $matches[1];
					
				$instances = get_option($widget->option_name);
				
				if ( isset($instances) && isset($number) ) {
					$instance = $instances[$number];
					
					if ( isset($instance['widget_display']) && check_wdisplay($instance['widget_display']) == false ) {
						unset($sidebars_widgets[$index][$i]);
					}
				}
			}
		}
		
		if ( empty($sidebars_widgets[$index]) ) return false;
		
	} else return false;
	
	return true;
}	
	
/**
 * Get Social share
 * */
    function get_social() {
	global $post;
	
	$social['social-share'] = furnicom_options()->getCpanelValue('social-share');
	$social['social-share-fb'] = furnicom_options()->getCpanelValue('social-share-fb');
	$social['social-share-tw'] = furnicom_options()->getCpanelValue('social-share-tw');
	$social['social-share-in'] = furnicom_options()->getCpanelValue('social-share-in');
	$social['social-share-go'] = furnicom_options()->getCpanelValue('social-share-go');
	
	if (!$social['social-share']) return false;

	$permalinked = urlencode(get_permalink($post->ID));
	$spermalink = get_permalink($post->ID);
	$title = urlencode($post->post_title);
	$stitle = $post->post_title;
	
	$data = '<div class="social-share">';
	$data .= '<style type="text/css">
				.social-share{
					display: table;
				    margin: 5px;
				    width: 100%;
				}
				.social-share-item{
					float: left;
				}
				.social-share-fb{
					margin-right: 25px;
                }
			</style>';
	
	if ($social['social-share-fb']) {
		$data .='<div class="social-share-fb social-share-item" >';
		$data .= '<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, \'script\', \'facebook-jssdk\'));</script>';
		$data .= '<div class="fb-like" data-href="'.$spermalink.'" data-send="true" data-layout="button_count" data-width="200" data-show-faces="false"></div>';
		$data .= '</div> <!--Facebook Button-->';
	}
		
	if ($social['social-share-tw']) {
		$data .='<div class="social-share-twitter social-share-item" >
					<a href="https://twitter.com/share" class="twitter-share-button" data-url="'. $spermalink .'" data-text="'.$stitle.'" data-count="horizontal">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
				</div> <!--Twitter Button-->';
	}
	
	if ($social['social-share-go']) {
		$data .= '<div class="social-share-google-plus social-share-item">
					<!-- Place this tag where you want the +1 button to render -->
					<div class="g-plusone" data-size="medium" data-href="'. esc_url( $permalinked ) .'"></div>
		
					<!-- Place this render call where appropriate -->
					<script type="text/javascript">
					  (function() {
						var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;
						po.src = "https://apis.google.com/js/plusone.js";
						var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);
					  })();
					</script>
				</div> <!--google plus Button-->';
	}
	
	if ($social['social-share-in']) {
		$data .= '<div class="social-share-linkedin social-share-item">
					<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
					<script type="IN/Share" data-url="'. $permalinked .'" data-counter="right"></script>
				</div> <!--linkedin Button-->';
	}

	$data .= '</div>';
	echo $data;

}


/**
 * Use Bootstrap's media object for listing comments
 *
 * @link http://twitter.github.com/bootstrap/components.html#media
 */

function furnicom_get_avatar($avatar) {
	$avatar = str_replace("class='avatar", "class='avatar pull-left media-object", $avatar);
	return $avatar;
}
add_filter('get_avatar', 'furnicom_get_avatar');

function furnicom_custom_direction(){
	global $wp_locale;
	$opt_direction = furnicom_options()->getCpanelValue('text_direction');
	$opt_direction = strtolower($opt_direction);
	if ( in_array($opt_direction, array('ltr', 'rtl')) ){
		$wp_locale->text_direction = $opt_direction;
	} else {
		// default by $wp_locale->text_direction;
	}
}
add_filter( 'wp', 'furnicom_custom_direction' );

function furnicom_navbar_class(){
	$classes = array( 'navbar' );

	if ( 'static' != furnicom_options()->getCpanelValue('navbar_position') )
		$classes[]	=	furnicom_options()->getCpanelValue('navbar_position');

	if ( furnicom_options()->getCpanelValue('navbar_inverse') )
		$classes[]	=	'navbar-inverse';

	apply_filters( 'furnicom_navbar_classes', $classes );

	echo 'class="' . join( ' ', $classes ) . '"';
}

function furnicom_content_product(){
	    $left_span_class 		= furnicom_options()->getCpanelValue('sidebar_left_expand');
	    $left_span_md_class 	= furnicom_options()->getCpanelValue('sidebar_left_expand_md');
	    $left_span_sm_class 	= furnicom_options()->getCpanelValue('sidebar_left_expand_sm');
		$right_span_class 		= furnicom_options()->getCpanelValue('sidebar_right_expand');
	    $right_span_md_class 	= furnicom_options()->getCpanelValue('sidebar_right_expand_md');
	    $right_span_sm_class 	= furnicom_options()->getCpanelValue('sidebar_right_expand_sm');
		$sidebar 				= is_singular( 'product' ) ? furnicom_options()->getCpanelValue('sidebar_product_detail') : furnicom_options()->getCpanelValue('sidebar_product');
    if( is_active_sidebar_Furnicom('left-product') && is_active_sidebar_Furnicom('right-product') && $sidebar =='lr' ){
		$content_span_class 	= 12 - ( $left_span_class + $right_span_class );
		$content_span_md_class 	= 12 - ( $left_span_md_class +  $right_span_md_class );
		$content_span_sm_class 	= 12 - ( $left_span_sm_class + $right_span_sm_class );
	} elseif( is_active_sidebar_Furnicom('left-product') && $sidebar =='left' ) {
		$content_span_class 	= 12 - $left_span_class ;
		$content_span_md_class 	= 12 - $left_span_md_class ;
		$content_span_sm_class 	= 12 - $left_span_sm_class ;
	}elseif( is_active_sidebar_Furnicom('right-product') && $sidebar =='right' ) {
		$content_span_class 	= 12 - $right_span_class;
		$content_span_md_class 	= 12 - $right_span_md_class ;
		$content_span_sm_class 	= 12 - $right_span_sm_class ;
	}else {
		$content_span_class 	= 12;
		$content_span_md_class 	= 12;
		$content_span_sm_class 	= 12;
	}
	$classes = array( 'content' );
	
		$classes[] = 'col-lg-'.$content_span_class.' col-md-'.$content_span_md_class .' col-sm-'.$content_span_sm_class;
	
	echo 'class="' . join( ' ', $classes ) . '"';
}
function furnicom_content_blog(){
	    $left_span_class 		= furnicom_options()->getCpanelValue('sidebar_left_expand');
	    $left_span_md_class 	= furnicom_options()->getCpanelValue('sidebar_left_expand_md');
	    $left_span_sm_class 	= furnicom_options()->getCpanelValue('sidebar_left_expand_sm');
		$right_span_class 		= furnicom_options()->getCpanelValue('sidebar_right_expand');
	    $right_span_md_class 	= furnicom_options()->getCpanelValue('sidebar_right_expand_md');
	    $right_span_sm_class 	= furnicom_options()->getCpanelValue('sidebar_right_expand_sm');
		$sidebar_template 		= furnicom_options() -> getCpanelValue('sidebar_blog');
    if($sidebar_template =='lr_sidebar' && is_active_sidebar_Furnicom('left-blog') && is_active_sidebar_Furnicom('right-blog')){
		$content_span_class 	= 12 - ($left_span_class + $right_span_class);
		$content_span_md_class 	= 12 - ( $left_span_md_class +  $right_span_md_class );
		$content_span_sm_class 	= 12 - ($left_span_sm_class + $right_span_sm_class);
	} elseif($sidebar_template =='left_sidebar'&& is_active_sidebar_Furnicom('left-blog')) {
		$content_span_class 	= 12 - $left_span_class ;
		$content_span_md_class 	= 12 - $left_span_md_class ;
		$content_span_sm_class 	= 12 - $left_span_sm_class ;
	}elseif($sidebar_template =='right_sidebar'&& is_active_sidebar_Furnicom('right-blog')) {
		$content_span_class 	= 12 - $right_span_class;
		$content_span_md_class 	= 12 - $right_span_md_class ;
		$content_span_sm_class 	= 12 - $right_span_sm_class ;
	}else {
		$content_span_class 	= 12;
		$content_span_md_class 	= 12;
		$content_span_sm_class 	= 12;
	}
	$classes = array( '' );
	
		$classes[] = 'col-lg-'.$content_span_class.' col-md-'.$content_span_md_class .' col-sm-'.$content_span_sm_class;
	
	echo  join( ' ', $classes ) ;
}

function furnicom_typography_css(){
	$styles = '';
	$page_webfonts  = get_post_meta( get_the_ID(), 'google_webfonts', true );
	$webfont 		= ( $page_webfonts != '' ) ? $page_webfonts : furnicom_options()->getCpanelValue( 'google_webfonts' );
	$header_webfont = furnicom_options()->getCpanelValue( 'header_tag_font' );
	$menu_webfont 	= furnicom_options()->getCpanelValue( 'menu_font' );
	$custom_webfont = furnicom_options()->getCpanelValue( 'custom_font' );
	$custom_class 	= furnicom_options()->getCpanelValue( 'custom_font_class' );
	
	$styles = '<style>';
	if ( $webfont ):	
		$webfonts_assign = ( get_post_meta( get_the_ID(), 'webfonts_assign', true ) != '' ) ? get_post_meta( get_the_ID(), 'webfonts_assign', true ) : '';
		if ( $webfonts_assign == 'headers' ){
			$styles .= 'h1, h2, h3, h4, h5, h6 {';
		} else if ( $webfonts_assign == 'custom' ){
			$custom_assign = ( get_post_meta( get_the_ID(), 'webfonts_custom', true ) ) ? get_post_meta( get_the_ID(), 'webfonts_custom', true ) : '';
			$custom_assign = trim($custom_assign);
			if ( !$custom_assign ) return '';
			$styles .= $custom_assign . ' {';
		} else {
			$styles .= 'body, input, button, select, textarea, .search-query {';
		}
		$styles .= 'font-family: ' . esc_attr( $webfont ) . ' !important;}';
	endif;
	
	/* Header webfont */
	if( $header_webfont ) :
		$styles .= 'h1, h2, h3, h4, h5, h6 {';
		$styles .= 'font-family: ' . esc_attr( $header_webfont ) . ' !important;}';
	endif;
	
	/* Menu Webfont */
	if( $menu_webfont ) :
		$styles .= '.primary-menu .menu-title, .vertical_megamenu .menu-title {';
		$styles .= 'font-family: ' . esc_attr( $menu_webfont ) . ' !important;}';
	endif;
	
	/* Custom Webfont */
	if( $custom_webfont && trim( $custom_class ) ) :
		$styles .= $custom_class . ' {';
		$styles .= 'font-family: ' . esc_attr( $custom_webfont ) . ' !important;}';
	endif;
	
	$styles .= '</style>';
	return $styles;
}

function furnicom_typography_css_cache(){
	/* Custom Css */
	if ( furnicom_options()->getCpanelValue('advanced_css') != '' ){
		echo'<style>'. furnicom_options()->getCpanelValue( 'advanced_css' ) .'</style>';
	}
	$data = furnicom_typography_css();
	echo sprintf( '%s', $data );
}
add_action( 'wp_head', 'furnicom_typography_css_cache', 12, 0 );


function furnicom_typography_webfonts(){
	$webfont 		= furnicom_options()->getCpanelValue('google_webfonts');
	$header_webfont = furnicom_options()->getCpanelValue( 'header_tag_font' );
	$menu_webfont 	= furnicom_options()->getCpanelValue( 'menu_font' );
	$custom_webfont = furnicom_options()->getCpanelValue( 'custom_font' );
	
	if ( $webfont || $header_webfont || $menu_webfont || $custom_webfont ):
		$font_url = '';
		$webfont_weight = array();
		$webfont_weight	= furnicom_options()->getCpanelValue('webfonts_weight');
		$font_weight = '';
		if( empty($webfont_weight) ){
			$font_weight = '400';
		}
		else{
			foreach( $webfont_weight as $i => $wf_weight ){
				( $i < 1 )?	$font_weight .= '' : $font_weight .= ',';
				$font_weight .= $wf_weight;
			}
		}
		
		$webfont = $webfont . ':' . $font_weight;
		
		if( $header_webfont ){
			$webfont1 = ( $webfont ) ? '|' . $header_webfont : $header_webfont;
			$webfont .= $webfont1 . ':' . $font_weight;
		}
		
		if( $menu_webfont ){
			$webfont1 = ( $webfont ) ? '|' . $menu_webfont : $menu_webfont;
			$webfont .= $webfont1 . ':' . $font_weight;
		}
		
		if( $custom_webfont ){
			$webfont1 = ( $webfont ) ? '|' . $custom_webfont : $custom_webfont;
			$webfont .= $webfont1 . ':' . $font_weight;
		}
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'furnicom' ) ) {
			$font_url = add_query_arg( 'family', urlencode( $webfont ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	endif;
}
function furnicom_googlefonts_script() {
    wp_enqueue_style( 'furnicomgooglefonts', furnicom_typography_webfonts(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'furnicom_googlefonts_script' );
function furnicom_custom_header_scripts() {
	if ( furnicom_options()->getCpanelValue('advanced_head') ){
		echo furnicom_options()->getCpanelValue('advanced_head');
	}
}
add_action( 'wp_head', 'furnicom_custom_header_scripts', 200 );
/* Favicon */
if ( ! function_exists( 'wp_site_icon' ) ) {
	function furnicom_add_favicon(){
		if ( furnicom_options()->getCpanelValue('favicon') ){
			echo '<link rel="shortcut icon" href="' . esc_url( furnicom_options()->getCpanelValue('favicon') ). '" />';
		}
	}
	add_action('wp_head', 'furnicom_add_favicon');
}
/* Get video or iframe from content */
function get_entry_content_asset( $post_id ){
	global $post;
	$post = get_post( $post_id );
	
	$content = apply_filters ("the_content", $post->post_content);
	
	$value=preg_match('/<iframe.*src=\"(.*)\".*><\/iframe>/isU',$content,$results);
	if($value){
		return $results[0];
	}else{
		return '';
	}
}
function excerpt($limit) {
  $excerpt = explode(' ', get_the_content(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

/*
** Product Meta
*/
add_action("admin_init", "post_init");
add_action( 'save_post', 'furnicom_product_save_meta', 10, 1 );
function post_init(){
	add_meta_box("furnicom_product_meta", esc_html__( 'Recommend Product:', 'furnicom' ), "furnicom_product_meta", "product", "normal", "low");
	add_meta_box("furnicom_product_video_meta", esc_html__( 'Featured Video Product', 'furnicom' ), "furnicom_product_video_meta", "product", "side", "low");
}	
function furnicom_product_meta(){
	global $post;
	$recommend_product = get_post_meta( $post->ID, 'recommend_product', true );
?>
	<p><label><b><?php esc_html_e( 'Recommend Product:', 'furnicom' ) ?></b></label> &nbsp;&nbsp;
	<input type="checkbox" name="recommend_product" value="yes" <?php if(esc_attr($recommend_product) == 'yes'){ echo "CHECKED"; }?> /></p>
<?php }

function furnicom_product_video_meta(){
	global $post;
	$featured_video_product = get_post_meta( $post->ID, 'featured_video_product', true );
?>
	<div class="featured-image">
		<?php if( $featured_video_product != '' ) : ?>
		<div class="video-wrapper">
			<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_attr( $featured_video_product ); ?>" frameborder="0" allowfullscreen></iframe>
		</div>
		<?php endif; ?>
		<p><input type="text" name="featured_video_product" placeholder="<?php echo esc_attr__( 'Youtube Video ID', 'furnicom' ) ?>" value="<?php echo esc_attr( $featured_video_product ); ?>"/></p>
	</div>
<?php 
}

function furnicom_product_save_meta(){
	global $post;
	$list_meta = array( 'recommend_product', 'featured_video_product' );
	foreach( $list_meta as $meta ){
		if( isset( $_POST[$meta] ) ){
			update_post_meta( $post->ID, $meta, $_POST[$meta] );
		}
	}
}
/*end product meta*/


remove_action( 'get_product_search_form', 'get_product_search_form', 10);
add_action('get_product_search_form', 'furnicom_search_product_form', 10);
function furnicom_search_product_form( ){
	$search_form_template = locate_template( 'product-searchform.php' );
	if ( '' != $search_form_template  ) {
		require $search_form_template;
		return;
	}

	$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
		<div class="product-search">
			<div class="product-search-inner">
				<input type="text" class="search-text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . __( 'Search for products', 'furnicom' ) . '" />
				<input type="submit" class="search-submit" id="searchsubmit" value="'. esc_attr__( 'Go', 'furnicom' ) .'" />
				<input type="hidden" name="post_type" value="product" />
			</div>
		</div>
	</form>';

	return apply_filters( 'furnicom_search_product_form', $form );
}

add_filter( 'widget_tag_cloud_args', 'furnicom_tag_clound' );
function furnicom_tag_clound($args){
	$args['largest'] = 8;
	return $args;
}

/*********************** Change direction RTL *************************************/
if( !is_admin() ){
	add_filter( 'language_attributes', 'furnicom_direction', 20 );
	function furnicom_direction( $doctype = 'html' ){
		$furnicom_direction = furnicom_options()->getCpanelValue( 'direction' );
		if ( ( function_exists( 'is_rtl' ) && is_rtl() ) || $furnicom_direction == 'rtl' )
			$furnicom_attribute[] = 'dir="rtl"';
		( $furnicom_direction === 'rtl' ) ? $lang = 'ar' : $lang = get_bloginfo('language');
		if ( $lang ) {
		if ( get_option('html_type') == 'text/html' || $doctype == 'html' )
			$furnicom_attribute[] = "lang=\"$lang\"";

		if ( get_option('html_type') != 'text/html' || $doctype == 'xhtml' )
			$furnicom_attribute[] = "xml:lang=\"$lang\"";
		}
		$furnicom_output = implode(' ', $furnicom_attribute);
		return $furnicom_output;
	}
}

/**
 * This class handles the Breadcrumbs generation and display
 */
class Furnicom_Breadcrumbs {

	/**
	 * Wrapper function for the breadcrumb so it can be output for the supported themes.
	 */
	function breadcrumb_output() {
		$this->breadcrumb( '<div class="breadcumbs">', '</div>' );
	}

	/**
	 * Get a term's parents.
	 *
	 * @param object $term Term to get the parents for
	 * @return array
	 */
	function get_term_parents( $term ) {
		$tax     = $term->taxonomy;
		$parents = array();
		while ( $term->parent != 0 ) {
			$term      = get_term( $term->parent, $tax );
			$parents[] = $term;
		}
		return array_reverse( $parents );
	}

	/**
	 * Display or return the full breadcrumb path.
	 *
	 * @param string $before  The prefix for the breadcrumb, usually something like "You're here".
	 * @param string $after   The suffix for the breadcrumb.
	 * @param bool   $display When true, echo the breadcrumb, if not, return it as a string.
	 * @return string
	 */
	function breadcrumb( $before = '', $after = '', $display = true ) {
		$options = array('breadcrumbs-home' => __( 'Home', 'furnicom' ), 'breadcrumbs-blog-remove' => false, 'post_types-post-maintax' => '0');
		
		global $wp_query, $post;	
		$on_front  = get_option( 'show_on_front' );
		$blog_page = get_option( 'page_for_posts' );

		$links = array(
			array(
				'url'  => get_home_url(),
				'text' => ( isset( $options['breadcrumbs-home'] ) && $options['breadcrumbs-home'] != '' ) ? $options['breadcrumbs-home'] : __( 'Home', 'furnicom' )
			)
		);

		if ( ( $on_front == "page" && is_front_page() ) || ( $on_front == "posts" && is_home() ) ) {

		} else if ( $on_front == "page" && is_home() ) {
			$links[] = array( 'id' => $blog_page );
		} else if ( is_singular() ) {		
			$tax = get_object_taxonomies( $post->post_type );
			if ( get_post_type_archive_link( $post->post_type ) ) {
				$links[] = array( 'ptarchive' => $post->post_type );
			}
			if ( 0 == $post->post_parent ) {
				if ( isset( $tax ) && count( $tax ) > 0 ) {
					$main_tax = $tax[0];
					if( $post->post_type == 'product' ){
						$main_tax = $tax[1];
					}					
					$terms    = wp_get_object_terms( $post->ID, $main_tax );
					
					if ( count( $terms ) > 0 ) {
						// Let's find the deepest term in this array, by looping through and then unsetting every term that is used as a parent by another one in the array.
						$terms_by_id = array();
						foreach ( $terms as $term ) {
							$terms_by_id[$term->term_id] = $term;
						}
						foreach ( $terms as $term ) {
							unset( $terms_by_id[$term->parent] );
						}

						// As we could still have two subcategories, from different parent categories, let's pick the first.
						reset( $terms_by_id );
						$deepest_term = current( $terms_by_id );

						if ( is_taxonomy_hierarchical( $main_tax ) && $deepest_term->parent != 0 ) {
							foreach ( $this->get_term_parents( $deepest_term ) as $parent_term ) {
								$links[] = array( 'term' => $parent_term );
							}
						}
						$links[] = array( 'term' => $deepest_term );
					}

				}
			} else {
				if ( isset( $post->ancestors ) ) {
					if ( is_array( $post->ancestors ) )
						$ancestors = array_values( $post->ancestors );
					else
						$ancestors = array( $post->ancestors );
				} else {
					$ancestors = array( $post->post_parent );
				}

				// Reverse the order so it's oldest to newest
				$ancestors = array_reverse( $ancestors );

				foreach ( $ancestors as $ancestor ) {
					$links[] = array( 'id' => $ancestor );
				}
			}
			$links[] = array( 'id' => $post->ID );
		} else {
			if ( is_post_type_archive() ) {
				$links[] = array( 'ptarchive' => get_post_type() );
			} else if ( is_tax() || is_tag() || is_category() ) {
				$term = $wp_query->get_queried_object();

				if ( is_taxonomy_hierarchical( $term->taxonomy ) && $term->parent != 0 ) {
					foreach ( $this->get_term_parents( $term ) as $parent_term ) {
						$links[] = array( 'term' => $parent_term );
					}
				}

				$links[] = array( 'term' => $term );
			} else if ( is_date() ) {
				$bc = __( 'Archives for', 'furnicom' );
				
				if ( is_day() ) {
					global $wp_locale;
					$links[] = array(
						'url'  => get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) ),
						'text' => $wp_locale->get_month( get_query_var( 'monthnum' ) ) . ' ' . get_query_var( 'year' )
					);
					$links[] = array( 'text' => $bc . " " . get_the_date() );
				} else if ( is_month() ) {
					$links[] = array( 'text' => $bc . " " . single_month_title( ' ', false ) );
				} else if ( is_year() ) {
					$links[] = array( 'text' => $bc . " " . get_query_var( 'year' ) );
				}
			} elseif ( is_author() ) {
				$bc = __( 'Archives for', 'furnicom' );
				$user    = $wp_query->get_queried_object();
				$links[] = array( 'text' => $bc . " " . esc_html( $user->display_name ) );
			} elseif ( is_search() ) {
				$bc = __( 'You searched for', 'furnicom' );
				$links[] = array( 'text' => $bc . ' "' . esc_html( get_search_query() ) . '"' );
			} elseif ( is_404() ) {
				$crumb404 = __( 'Error 404: Page not found', 'furnicom' );
				$links[] = array( 'text' => $crumb404 );
			}
		}
		
		$output = $this->create_breadcrumbs_string( $links );

		if ( $display ) {
			echo $before . $output . $after;
			return true;
		} else {
			return $before . $output . $after;
		}
	}

	/**
	 * Take the links array and return a full breadcrumb string.
	 *
	 * Each element of the links array can either have one of these keys:
	 *       "id"            for post types;
	 *    "ptarchive"  for a post type archive;
	 *    "term"         for a taxonomy term.
	 * If either of these 3 are set, the url and text are retrieved. If not, url and text have to be set.
	 *
	 * @link http://support.google.com/webmasters/bin/answer.py?hl=en&answer=185417 Google documentation on RDFA
	 *
	 * @param array  $links   The links that should be contained in the breadcrumb.
	 * @param string $wrapper The wrapping element for the entire breadcrumb path.
	 * @param string $element The wrapping element for each individual link.
	 * @return string
	 */
	function create_breadcrumbs_string( $links, $wrapper = 'ul', $element = 'li' ) {
		global $paged;
		
		$output = '';

		foreach ( $links as $i => $link ) {

			if ( isset( $link['id'] ) ) {
				$link['url']  = get_permalink( $link['id'] );
				$link['text'] = strip_tags( get_the_title( $link['id'] ) );
			}

			if ( isset( $link['term'] ) ) {
				$link['url']  = get_term_link( $link['term'] );
				$link['text'] = $link['term']->name;
			}

			if ( isset( $link['ptarchive'] ) ) {
				$post_type_obj = get_post_type_object( $link['ptarchive'] );
				if ( $post_type_obj == NULL){
					$archive_title = 'Not found';
				}
				else{
					$archive_title = $post_type_obj->labels->menu_name;	
				}
				$link['url']  = get_post_type_archive_link( $link['ptarchive'] );
				$link['text'] = $archive_title;
			}
			
			$link_class = '';
			if ( isset( $link['url'] ) && ( $i < ( count( $links ) - 1 ) || $paged ) ) {
				$link_output = '<a href="' . esc_url( $link['url'] ) . '" >' . esc_html( $link['text'] ) . '</a><span class="go-page">></span>';
			} else {
				$link_class = ' class="active" ';
				$link_output = '<span>' . esc_html( $link['text'] ) . '</span>';
			}
			
			$element = esc_attr(  $element );
			$element_output = '<' . $element . $link_class . '>' . $link_output . '</' . $element . '>';
			
			$output .=  $element_output;
			
			$class = ' class="breadcrumb" ';
		}

		return '<' . $wrapper . $class . '>' . $output . '</' . $wrapper . '>';
	}

}

global $yabreadcrumb;
$yabreadcrumb = new Furnicom_Breadcrumbs();

if ( !function_exists( 'furnicom_breadcrumb' ) ) {
	/**
	 * Template tag for breadcrumbs.
	 *
	 * @param string $before  What to show before the breadcrumb.
	 * @param string $after   What to show after the breadcrumb.
	 * @param bool   $display Whether to display the breadcrumb (true) or return it (false).
	 * @return string
	 */
	function furnicom_breadcrumb( $before = '', $after = '', $display = true ) {
		global $yabreadcrumb;
		return $yabreadcrumb->breadcrumb( $before, $after, $display );
	}
}
if( class_exists( 'WooCommerce' ) ){
	add_action( 'wp_footer', 'Furnicom_Login_Popup' );
	function Furnicom_Login_Popup(){
		if( furnicom_options()->getCpanelValue( 'product_quickview' ) ){
?>
		<div class="sw-quickview-bottom">
			<div class="quickview-content" id="quickview_content">
				<a href="javascript:void(0)" class="quickview-close">x</a>
				<div class="quickview-inner"></div>
			</div>	
		</div>
<?php 
		}		
?>
		<div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog block-popup-login">
				<a href="javascript:void(0)" title="<?php esc_attr_e( 'Close', 'furnicom' ) ?>" class="close close-login" data-dismiss="modal"><?php esc_html_e( 'Close', 'furnicom' ) ?></a>
				<div class="tt_popup_login"><strong><?php esc_html_e('Sign in Or Register', 'furnicom'); ?></strong></div>
				<?php get_template_part('woocommerce/myaccount/login-form'); ?>
			</div>
		</div>
<?php
	}
}

/*
** Breadcrumb Custom with title 
*/
function furnicom_breadcrumb_title(){
	$maintaince_attr = ( furnicom_options()->getCpanelValue( 'bg_breadcrumb' ) != '' ) ? 'style="background: url( '. esc_url( furnicom_options()->getCpanelValue( 'bg_breadcrumb' ) ) .' )"' : '';
	if( furnicom_options()->getCpanelValue( 'product_banner' ) == 'listing' ){
		if( is_shop() || is_tax( 'product_cat' ) || is_post_type_archive( 'product' ) ){
			$term = get_term_by( 'slug', get_query_var('term'), get_query_var('taxonomy') );
			if( $term ) {
				$thumbnail_id 	= get_term_meta( $term->term_id, 'thumbnail_id', true );
				$thumb 			= wp_get_attachment_image_src( $thumbnail_id,'full' );
				$maintaince_attr = ( $thumb ) ? 'style="background: url( '. esc_url( $thumb[0] ) .' )"' : '';
			}else{
				$thumb = furnicom_options()->getCpanelValue( 'product_listing_banner' );
				$maintaince_attr = ( $thumb ) ? 'style="background: url( '. esc_url( $thumb ) .' )"' : '';
			}
		}
		if( is_singular( 'product' ) ){
			$terms = get_the_terms( get_the_ID(), 'product_cat' );
			$term  = $terms[0]->term_id;
			$thumbnail_id 	= get_term_meta( $term, 'thumbnail_id', true );
			$thumb 			= wp_get_attachment_image_src( $thumbnail_id,'full' );
			$maintaince_attr = ( $thumb ) ? 'style="background: url( '. esc_url( $thumb[0] ) .' )"' : '';
			
		}
	}
?>
	<div class="listings-title" <?php echo $maintaince_attr; ?>>
		<div class="container">
			<div class="wrap-title">
				<h1 class="entry-title">
				<?php 	
					if( class_exists( 'WooCommerce' ) ) :
						( is_woocommerce() ) ? woocommerce_page_title() : furnicom_title();			
					else: 
						furnicom_title();	
					endif;
				?>
				</h1>
				<?php if (!is_front_page() ) { ?>
					<div class="bread">
						<?php

							if (function_exists('furnicom_breadcrumb')){
								furnicom_breadcrumb('<div class="breadcrumbs theme-clearfix"><div class="container">', '</div></div>');
							} 

						?>
					</div>
				<?php } ?>
			</div>
		</div>			
	</div>
<?php 
}

/*
** Advanced Favico
*/
add_filter( 'get_site_icon_url', 'furnicom_site_favicon', 10, 1 );
function furnicom_site_favicon( $url ){
	if ( furnicom_options()->getCpanelValue('favicon') ){
		$url = esc_url( furnicom_options()->getCpanelValue('favicon') );
	}
	return $url;
}


/**
* Popup Newsletter & Menu Sticky
**/
function furnicom_advanced(){	
	$output  = '';
	$output .= '(function($) {';			
			/*
			** Adnvanced JS
			*/
			if( furnicom_options()->getCpanelValue( 'advanced_js' ) != '' ) :
				$output .= furnicom_options()->getCpanelValue( 'advanced_js' );
			endif;
		$output .= '}(jQuery));';
		
		$translation_text = array(
			'cart_text' 		 => esc_html__( 'Add To Cart', 'furnicom' ),
			'compare_text' 	 => esc_html__( 'Add To Compare', 'furnicom' ),
			'wishlist_text'  => esc_html__( 'Add To WishList', 'furnicom' ),
			'quickview_text' => esc_html__( 'QuickView', 'furnicom' ),
		);
		
		wp_localize_script( 'furnicom_custom_js', 'custom_text', $translation_text );
		wp_enqueue_script( 'furnicom_custom_js', get_template_directory_uri() . '/js/custom_text.js', array(), null, true );
		wp_add_inline_script( 'furnicom_custom_js', $output );
	
}
add_action( 'wp_enqueue_scripts', 'furnicom_advanced', 101 );

