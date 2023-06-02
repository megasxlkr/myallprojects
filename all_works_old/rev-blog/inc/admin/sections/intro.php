<?php
/**
 * Welcome screen intro template
 */
?>
<?php
$discovery = wp_get_theme( 'discovery' );

?>
<div class="col two-col" style="margin-bottom: 1.618em; overflow: hidden;">
	<div class="col">
		<h1 style="margin-right: 0;"><?php echo '<strong>REV-BLOG TEMASI</strong> <sup style="font-weight: bold; font-size: 50%; padding: 5px 10px; color: #666; background: #fff;">' . esc_attr( $discovery['Version'] ) . '</sup>'; ?></h1>
		<p style="font-size: 1.2em;"><?php _e( 'Temayı başarılı bir şekilde kurdunuz. Tema içerik ve ayarlarını <strong>otomatik</strong> olarak aktif etmeniz için iki adım daha kaldı.', 'discovery' ); ?></p>
		<p style="font-size: 1.2em;"><?php _e( '1. ADIM OLARAK: <strong>GÖRÜNÜM / ZORUNLU EKLENTİLER</strong> Sayfasını ziyaret ederek tüm gerekli eklentileri kurunuz. <br><br>2. ADIM OLARAK: <strong>GÖRÜNÜM / DEMO İÇERİK YÜKLEME</strong> Sayfasını ziyaret ederek demo içeriği yükleme butonuna tıklayınız. )', 'discovery' ); ?></p>
	</div>
	

	<div class="col last-feature">
		<img src="<?php echo esc_url( get_template_directory_uri() ) . '/screenshot.png'; ?>" alt="discovery" class="image-50" width="440" />
	</div>
</div>
