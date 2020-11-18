    </div>
    <footer>
        <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'navbar-nav mr-auto']); ?>
    </footer>
    <?= get_option('agence_horaire'); ?>
    <?php wp_footer() ?>
</body>
</html>