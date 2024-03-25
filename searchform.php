<?php
/**
 * Template for displaying search forms
 */
?>

<form class="search-form" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" name="s" placeholder="<?php echo __( 'Enter Keywords','ReleUA'); ?>" value="<?php echo get_search_query(); ?>">
    <button type="submit">
        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
            <path d="M31.498 29.365l-8.533-8.533c1.757-2.133 2.761-4.894 2.761-7.906 0-7.153-5.773-12.925-12.8-12.925s-12.925 5.773-12.925 12.925 5.773 12.925 12.925 12.925c3.012 0 5.773-1.004 7.906-2.761l8.533 8.533c0.251 0.251 0.753 0.502 1.129 0.502s0.753-0.126 1.129-0.502c0.502-0.753 0.502-1.631-0.125-2.259zM19.702 19.702c0 0 0 0 0 0s0 0 0 0c-1.757 1.757-4.141 2.886-6.902 2.886-5.396 0-9.788-4.392-9.788-9.788s4.518-9.663 9.914-9.663 9.663 4.392 9.663 9.788c0 2.635-1.129 5.020-2.886 6.776z"></path>
        </svg>
    </button>
</form>
