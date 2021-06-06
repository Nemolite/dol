<?php
/**
 * Банеры для сайтбара (желтый)
 */

defined( 'ABSPATH' ) || exit;

class BanersSitebarWidgetSun extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'sitebanerssun', 
			'Банер (желтый)', // заголовок виджета
			array( 'description' => 'Банеры для сайтбара' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $paramsun ) {
		?>
        <div class="dol-banners-block-sun">
            <div class="dol-banners-block-img">
            <a href="<?php echo esc_url($paramsun['url']);?>" 
                title="A Paradise for Holiday">
                <img width="130" height="90" 
                src="<?php echo esc_url($paramsun['img']);?>" 
                class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" 
                alt="<?php echo __( $paramsun['title'], 'dol');?>" 
                loading="lazy" 
                title="<?php echo __( $paramsun['title'], 'dol');?>" 
                >
            </a>

            </div>
            <div class="dol-banners-block-text">
                <h3 class="dol-banners-block-title">
			        <a href="<?php echo esc_url($paramsun['url']);?>" 
                        title="<?php echo __( $paramsun['title'], 'dol');?>">
                        <?php echo __( $paramsun['title'], 'dol');?>
                    </a>
		        </h3> 
            </div>

        </div>
       
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $paramsun ) {
		if ( isset( $paramsun[ 'title' ] ) ) {
			$title = $paramsun[ 'title' ];
		}
        
        if ( isset( $paramsun[ 'img' ] ) ) {
			$img = $paramsun[ 'img' ];
		}

        if ( isset( $paramsun[ 'url' ] ) ) {
			$url = $paramsun[ 'url' ];
		}
		?>

        <p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">Заголовок</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>">Изображение (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="url" value="<?php echo esc_attr( $img ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_id( 'url' ); ?>">Ссылка с банера (url)</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="url" value="<?php echo esc_attr( $url ); ?>" />
		</p>		
		<?php 
	}
 
	/*
	 * сохранение настроек виджета
	 */
	public function update( $new_instance, $old_instance ) {
		$paramsun = array();
		$paramsun['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
        $paramsun['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $paramsun['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $paramsun;
	}
}
 
/*
 * регистрация виджета
 */
function dol_baners_sitebar_widget_load_sun() {
	register_widget( 'BanersSitebarWidgetSun' );
}
add_action( 'widgets_init', 'dol_baners_sitebar_widget_load_sun' );



?>
