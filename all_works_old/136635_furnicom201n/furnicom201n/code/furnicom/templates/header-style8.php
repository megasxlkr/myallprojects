<?php 
	$furnicom_colorset = furnicom_options()->getCpanelValue('scheme');
	$search = furnicom_options()->getCpanelValue('search');
	$furnicom_header_style = furnicom_options()->getCpanelValue('header_style');
?>
<div class="header-<?php echo $furnicom_header_style; ?>">
	<header id="header"  class="header">
		<div class="header-msg">
			<div class="container">
				<div class="top-header-sidebar pull-left">
					<?php if (is_active_sidebar_Furnicom('top-lang')) {?>
						<div id="sidebar-lang" class="sidebar-lang pull-left">
							<?php dynamic_sidebar('top-lang'); ?>
						</div>
					<?php }?>
					
					<?php if (is_active_sidebar_Furnicom('login-top')) {?>
					<div class="top-header-sidebar-menu pull-left">
						<div class="my-account"><i class="fa fa-user"></i><?php esc_html_e( 'My Account', 'furnicom' ) ?></div>
						<div id="sidebar-login-top" class="sidebar-login-top">
							<?php dynamic_sidebar('login-top'); ?>
						</div>						
					</div>	
					<?php }?>
					
					<?php if (is_active_sidebar_Furnicom('top')) {?>
						<div id="sidebar-top" class="sidebar-top pull-left">
							<?php dynamic_sidebar('top'); ?>
						</div>
					<?php }?>
				</div>
				<?php if (is_active_sidebar_Furnicom('top-header-left')) {?>
					<div id="top-header-left" class="top-header-left pull-right">
						<?php dynamic_sidebar('top-header-left'); ?>
					</div>
				<?php }?>
			</div>
		</div>
		<div class="container top">
			<div class="top-header">
				<?php if (is_active_sidebar_Furnicom('header-left')) {?>
					<div id="header-left" class="header-left pull-left">
						<?php dynamic_sidebar('header-left'); ?>
					</div>
				<?php }?>
				<div class="furnicom-logo">
					<a  href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php if(furnicom_options()->getCpanelValue('sitelogo')){ ?>
							<img src="<?php echo esc_attr( furnicom_options()->getCpanelValue('sitelogo') ); ?>" alt="<?php bloginfo('name'); ?>"/>
						<?php }else{
							if ($furnicom_colorset){$logo = get_template_directory_uri().'/assets/img/logo-'.$furnicom_colorset.'.png';}
							else $logo = get_template_directory_uri().'/assets/img/logo-default.png';
						?>
							<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php bloginfo('name'); ?>"/>
						<?php } ?>
					</a>
				</div>
				<?php if (is_active_sidebar_Furnicom('header-right8')) {?>
					<div id="header-right8" class="header-right8 pull-right">
						<?php dynamic_sidebar('header-right8'); ?>
						<?php get_template_part( 'woocommerce/minicart-ajax-style2' ); ?>
					</div>
				<?php }?>
			</div>
		</div>
	</header>
	<?php if ( has_nav_menu('primary_menu') ) {?>
		<!-- Primary navbar -->
	<div id="main-menu" class="main-menu">
		<div class="container">
			<nav id="primary-menu" class="primary-menu pull-left">
				<div class="mid-header clearfix">
					<a href="#" class="phone-icon-menu"></a>
					<div class="navbar-inner navbar-inverse">
							<?php
								$furnicom_menu_class = 'nav nav-pills';
								if ( 'mega' == furnicom_options()->getCpanelValue('menu_type') ){
									$furnicom_menu_class .= ' nav-mega';
								} else $furnicom_menu_class .= ' nav-css';
							?>
							<?php wp_nav_menu(array('theme_location' => 'primary_menu', 'menu_class' => $furnicom_menu_class)); ?>
					</div>
				</div>
				<a href="#" class="btn-search-mobile pull-right"><i class="fa fa-search"></i></a>
			</nav>
			<?php if (is_active_sidebar_Furnicom('menu-right')) {?>
				<div id="menu-right" class="menu-right pull-right">
					<?php dynamic_sidebar('menu-right'); ?>
				</div>
			<?php }?>
		</div>
	</div>
		<!-- /Primary navbar -->
	<?php 
		} 
	?>
</div>
