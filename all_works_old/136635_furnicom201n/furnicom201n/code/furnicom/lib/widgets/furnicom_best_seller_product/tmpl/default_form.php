<?php
$number    		= isset( $instance['numberposts'] ) ? intval($instance['numberposts']) : 5;
$el_class  = isset( $instance['el_class'] )    ? 	strip_tags($instance['el_class']) : '';
$style_title  = isset( $instance['style_title'] )    ? 	strip_tags($instance['style_title']) : '';
?>

<p>
	<label for="<?php echo esc_attr( $this->get_field_id('numberposts') ); ?>"><?php esc_html_e('Number of Posts', 'furnicom')?></label>
	<br />
	<input class="widefat"
		id="<?php echo esc_attr( $this->get_field_id('numberposts') ); ?>"name="<?php echo esc_attr( $this->get_field_name('numberposts') ); ?>" type="text"
		value="<?php echo esc_attr($number); ?>" />
</p>
<p>
			<label for="<?php echo esc_attr( $this->get_field_id('el_class') ); ?>"><?php esc_html_e('El_class', 'furnicom')?></label>
			<br />
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id('el_class') ); ?>" name="<?php echo esc_attr( $this->get_field_name('el_class') ); ?>"
				type="text"	value="<?php echo esc_attr($el_class); ?>" />
		</p>

<?php $style_title_name = array('title1' => 'title1', 'title2' => 'title2', 'title3' => 'title3', 'title4' => 'title4'); ?>
<p>
			<label for="<?php echo esc_attr( $this->get_field_id('style_title') ); ?>"><?php esc_html_e('Style title ', 'furnicom')?></label>
			<br />
			<select class="widefat"
				id="<?php echo esc_attr( $this->get_field_id('style_title') ); ?>"
				name="<?php echo esc_attr( $this->get_field_name('style_title') ); ?>">
				<?php
				$option ='';
				foreach ($style_title_name as $key => $value) :
					$option .= '<option value="' . esc_attr( $value ) . '" ';
					if ($value == $style_title){
						$option .= 'selected="selected"';
					}
					$option .=  '>'.$key.'</option>';
				endforeach;
				echo $option;
				?>
			</select>
		</p> 