<?php
/**
 * The logo group for the header 
 * @package Shaped Pixels
 */
?>


<?php if ( get_option( 'shaped_pixels_logo' ) ) : ?>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home">
        <img id="logo" src="<?php echo get_option( 'shaped_pixels_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?>">
    </a>

<?php elseif ( get_bloginfo( 'description' ) || get_bloginfo( 'title' ) ) : ?>

    <h1 class="site-title">
        <a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> 
            <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?>
        </a>
    </h1>
    								
	<?php if ( get_bloginfo( 'description' ) ) { ?>
        <h2 class="site-tagline"><?php echo esc_attr( get_bloginfo( 'description' ) ); ?></h2>
    <?php } ?>

<?php endif; ?>