<?php
	$paged 			= (get_query_var('paged')) ? get_query_var('paged') : 1;
	$product_cat 	= isset( $_GET['category_product'] ) ? $_GET['category_product'] : '';
	$product_sku 	= isset( $_GET['search_sku'] ) ? $_GET['search_sku'] : 0;
	$s 				= isset( $_GET['s'] ) ? $_GET['s'] : '';	
	$number_select	= 6;
	$args_product = array();
	$check 		= false;
	if( $product_sku ) {
		global $wpdb;
		$post_ids = $wpdb->get_col( $wpdb->prepare( 
		"SELECT SQL_CALC_FOUND_ROWS {$wpdb->posts}.ID FROM {$wpdb->posts} INNER JOIN {$wpdb->postmeta} ON ( {$wpdb->posts}.ID = {$wpdb->postmeta}.post_id ) 
		WHERE ((({$wpdb->posts}.post_title LIKE %s) OR ({$wpdb->posts}.post_excerpt LIKE %s) OR ({$wpdb->posts}.post_content LIKE %s)) OR ( ( {$wpdb->postmeta}.meta_key = '_sku' AND {$wpdb->postmeta}.meta_value LIKE %s ) ) ) 
		AND ({$wpdb->posts}.post_password = '') AND {$wpdb->posts}.post_type = 'product' AND ({$wpdb->posts}.post_status = 'publish') 
		GROUP BY {$wpdb->posts}.ID 
		ORDER BY {$wpdb->posts}.post_title LIKE %s DESC, {$wpdb->posts}.post_date DESC", '%' .$s . '%', '%' .$s . '%', '%' .$s . '%', '%' .$s . '%', '%' .$s . '%' ) );
		if( count( $post_ids ) > 0 ){
			$check = true;
			$args_product = array(
				'post_type' => 'product',
				'post__in'  => $post_ids,
				'posts_per_page' => 12,
				'paged' => $paged
			);
		}
	}else{		
		$check = true;
		$args_product = array(
			'post_type'	=> 'product',
			'posts_per_page' => 12,
			'paged' => $paged,
			's' => $s
		);
	}
	
	if( $product_cat != '' ){
		$args_product['tax_query'] = array(
			array(
				'taxonomy'	=> 'product_cat',
				'field'		=> 'slug',
				'terms'	=> $product_cat				
			)
		);
	}
?>
<div id="search-product" class="content-list-category container">
	<div class="row">
		<div id="contents" role="main">
			<div class="content_list_product">
				<div class="products-wrapper">		
				<?php
					$product_query = new wp_query( $args_product );
					if( $product_query -> have_posts() && $check ){
				?>
					<ul id="loop-products" class="products-loop row clearfix grid-view grid" data-postids="<?php echo ( $product_sku ) ? implode( ',', $post_ids ) : ''; ?>" data-attributes="<?php echo furnicom_product_attribute(); ?>" data-maxpage="<?php echo esc_attr( $product_query->max_num_pages ); ?>">
					<?php 
						while( $product_query -> have_posts() ) : $product_query -> the_post(); 
						global $product, $post;
						$product_id = $post->ID;
					?>
						<li <?php post_class( furnicom_product_attribute() ); ?>>
							<div class="item-wrap">
								<div class="item-detail">										
									<div class="item-img products-thumb">											
										<!-- quickview & thumbnail  -->
										<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
									</div>										
									<div class="item-content">
										<h4><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h4>								
																					
										<!-- rating  -->
										<?php 
											$rating_count = $product->get_rating_count();
											$review_count = $product->get_review_count();
											$average      = $product->get_average_rating();
										?>
										<div class="reviews-content">
											<div class="star"><?php echo sprintf( ( $average > 0 ) ?'<span style="width: %dpx"></span>' : '', $average*13 ); ?></div>
										</div>	
										<!-- end rating  -->
										<?php if ( $price_html = $product->get_price_html() ){?>
										<div class="item-price">
											<span>
												<?php echo sprintf( '%s', $price_html ); ?>
											</span>
										</div>
										<?php } ?>
										<?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
									</div>
								</div>
							</div>
						</li>
						<?php	endwhile;
						
					?>
					</ul>
					<!--Pagination-->
					<?php if ($product_query->max_num_pages > 1) : ?>
					<div class="pag-search ">
						<div class="pagination nav-pag pull-right">
							<?php if( $product_sku ) { ?>
								<?php if( $product_query->max_num_pages < $number_select ) { ?>
								<ul class="page-numbers sw-ajax-pagination">	
									<li><a href="#" class="prev disabled"> <?php echo esc_html__( 'Prev', 'furnicom' ); ?></a></li>
									<?php for( $i = 1; $i <= $product_query->max_num_pages; $i++ ){ ?>
									<li  class="<?php echo esc_attr( $i == 1 ? 'current' : '' ); ?>" ><a href="#" data-paged="<?php echo esc_attr( $i ); ?>"><?php echo $i; ?></a>
									<?php } ?>	
									<li><a href="#" class="next"><?php echo esc_html__( 'Next', 'furnicom' ); ?></a></li>
								</ul>
								<?php }else{ ?>
								<div class="sw-ajax-pagination">
									<span class="page-title"><?php esc_html_e( 'Page', 'furnicom' ); ?>:</span>
									<select class="sw-select-pagination">
										<?php for( $i = 1; $i <= $product_query->max_num_pages; $i++ ){ ?>
											<option value="<?php echo esc_attr( $i ); ?>"><?php echo $i; ?></option>
										<?php } ?>
									</select>
								</div>
								<?php } ?>
							<?php }else{ ?>
								<?php 
									echo paginate_links( array(
										'base' => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),
										'format' => '?paged=%#%',
										'current' => max( 1, get_query_var('paged') ),
										'total' => $product_query->max_num_pages,
										'end_size' => 1,
										'mid_size' => 1,
										'prev_text' => '<i class="fa fa-angle-left"></i>',
										'next_text' => '<i class="fa fa-angle-right"></i>',
										'type' => 'list',
										
									) );
								?>
							<?php } ?>
						</div>
					</div>
			<?php endif;wp_reset_postdata(); ?>
			<!--End Pagination-->
			<?php 
				}else{
					get_template_part( 'templates/no-results' );
				}
			?>
				</div>
			</div>
		</div>
	</div>
</div>