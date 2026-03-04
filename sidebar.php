<aside id="sidebar">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    <?php else : ?>
        <p><?php esc_html_e( 'Add widgets to the sidebar.', 'my-theme' ); ?></p>
    <?php endif; ?>
</aside>
