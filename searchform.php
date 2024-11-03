<?php
/**
 * Template for displaying search forms in Twenty Eleven
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <!-- <label for="s" class="assistive-text"><?php //_e( 'Search', 'webwp' ); ?></label> -->
    <input type="text" class="form-control field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'webwp' ); ?>" />
    <input type="submit" class="submit btn btn-primary" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'webwp' ); ?>" />
</form>