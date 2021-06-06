<?php
/**
 * Банеры для сайтбара (синий)
 */

defined( 'ABSPATH' ) || exit;

class BanersSitebarWidgetSky extends WP_Widget {
 
	/*
	 * создание виджета
	 */
	function __construct() {
		parent::__construct(
			'sitebanerssky', 
			'Банер (синий)', // заголовок виджета
			array( 'description' => 'Банеры для сайтбара' ) // описание
		);
	}
 
	/*
	 * фронтэнд виджета
	 */
	public function widget( $args, $paramsky ) {
		?>
        <div class="dol-banners-block-sky">
            <div class="dol-banners-block-img">
            <a href="<?php echo esc_url($paramsky['url']);?>" 
                title="A Paradise for Holiday">
                <img width="130" height="90" 
                src="<?php echo esc_url($paramsky['img']);?>" 
                class="attachment-colormag-featured-post-small size-colormag-featured-post-small wp-post-image" 
                alt="<?php echo __( $paramsky['title'], 'dol');?>" 
                loading="lazy" 
                title="<?php echo __( $paramsky['title'], 'dol');?>" 
                >
            </a>

            </div>
            <div class="dol-banners-block-text">
                <h3 class="dol-banners-block-title">
			        <a href="<?php echo esc_url($paramsky['url']);?>" 
                        title="<?php echo __( $paramsky['title'], 'dol');?>">
                        <?php echo __( $paramsky['title'], 'dol');?>
                    </a>
		        </h3> 
            </div>

        </div>
       
        <?php
	}
 
	/*
	 * бэкэнд виджета
	 */
	public function form( $paramsky ) {
		if ( isset( $paramsky[ 'title' ] ) ) {
			$title = $paramsky[ 'title' ];
		}
        
        if ( isset( $paramsky[ 'img' ] ) ) {
			$img = $paramsky[ 'img' ];
		}

        if ( isset( $paramsky[ 'url' ] ) ) {
			$url = $paramsky[ 'url' ];
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
		$paramsky = array();
		$paramsky['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';	
        $paramsky['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
        $paramsky['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';
		return $paramsky;
	}
}
 
/*
 * регистрация виджета
 */
function dol_baners_sitebar_widget_load_sky() {
	register_widget( 'BanersSitebarWidgetSky' );
}
add_action( 'widgets_init', 'dol_baners_sitebar_widget_load_sky' );



?>
