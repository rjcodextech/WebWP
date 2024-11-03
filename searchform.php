<?php
/*
|-----------------------------------------------------------
| Search Form Template
|-----------------------------------------------------------
|
| Template for displaying search forms
|
*/
?>
<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label for="s" class="screen-reader-text"><?php esc_attr_e( 'Search for', 'webwp' ); ?>:</label>
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'webwp' ); ?>...">
    <button type="submit" id="searchsubmit"><?php esc_attr_e( 'Search', 'webwp' ); ?></button>
</form>
