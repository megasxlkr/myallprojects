<?php 
	/* 
	** Content Footer Mobile
	*/
	
?>
<footer id="footer" class="footer-mstyle1 style2 theme-clearfix">
	<div class="footer-container">
		<div class="footer-menu clearfix">
			<div class="menu-item">
				<div class="footer-home">
					<a href="<?php echo esc_url( home_url('/') ); ?>" title="<?php esc_attr_e( 'Home', 'furnicom' ) ?>">
						<span class="icon-menu"></span>
						<span class="menu-text"><?php esc_html_e( "Home", 'furnicom' )?></span>
					</a>
				</div>
			</div>
			<div class="menu-item">
				<div class="footer-search">
					<a href="javascript:void(0)" title="Search">
						<span class="icon-menu"></span>
						<span class="menu-text"><?php esc_html_e( "Search", 'furnicom' )?></span>
					</a>
					<div class="top-form top-search">
						<div class="topsearch-entry">
                             <?php get_template_part( 'widgets/furnicom_top/searchcate' ); ?>
						</div>
                    </div>
					
				</div>
			</div>
			<div class="menu-item">
				<div class="footer-cart">
					<a href="<?php echo get_permalink(get_option('woocommerce_cart_page_id') ); ?>">
						<?php get_template_part( 'woocommerce/minicart-ajax-mobile' ); ?>
					</a>
				</div>
			</div>
			<div class="menu-item">
				<div class="footer-myaccount">
					<a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php esc_attr_e('My Account','furnicom'); ?>">
						<span class="icon-menu"></span>
						<span class="menu-text"><?php esc_html_e('My Account','furnicom'); ?></span>
					</a>
				</div>
			</div>
			<div class="menu-item">
				<div class="footer-more">
					<a href="javascript:void(0)" title="<?php esc_attr_e('More','furnicom'); ?>">
						<span class="icon-menu"></span>
						<span class="menu-text"><?php esc_html_e('More','furnicom'); ?></span>
					</a>
				</div>
			</div>
			<div class="menu-item-hidden">
				<?php if ( has_nav_menu('menu_mobile1') ) {?>
						<div class="wrapper_menu_footer">
							<?php wp_nav_menu(array('theme_location' => 'menu_mobile1', 'menu_class' => 'menu-footer')); ?>
						</div>
				<?php } ?>
				<div class="footer-wishlist">
					<a href="<?php echo get_permalink( get_option('yith_wcwl_wishlist_page_id') ); ?>" title="<?php esc_attr_e('Wishlist','furnicom'); ?>">
						<span class="menu-text"><?php esc_html_e('Wishlist','furnicom'); ?></span>
					</a>
				</div>
				<div class="footer-checkout">
					<a href="<?php echo get_permalink( get_option('woocommerce_checkout_page_id') ); ?>" title="<?php esc_attr_e('Checkout','furnicom'); ?>">
						<span class="menu-text"><?php esc_html_e('Checkout','furnicom'); ?></span>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>