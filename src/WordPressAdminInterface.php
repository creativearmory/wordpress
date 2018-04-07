<?php
namespace CreativeArmory;

/**********************************************************************************
 *   _____                _   _            ___                                    *
 *  /  __ \              | | (_)          / _ \                                   *
 *  | /  \/_ __ ___  __ _| |_ ___   _____/ /_\ \_ __ _ __ ___   ___  _ __ _   _   *
 *  | |   | '__/ _ \/ _` | __| \ \ / / _ \  _  | '__| '_ ` _ \ / _ \| '__| | | |  *
 *  | \__/\ | |  __/ (_| | |_| |\ V /  __/ | | | |  | | | | | | (_) | |  | |_| |  *
 *   \____/_|  \___|\__,_|\__|_| \_/ \___\_| |_/_|  |_| |_| |_|\___/|_|   \__, |  *
 *                                                                         __/ |  *
 *                                                                        |___/   *
 *********************************************************************************/

interface WordPressAdminInterface
{
    /**
     * Return instance of the running object using singleton design pattern
     * @return mixed
     *
     *
       private static $instance = null;
       public static function admin_init()
       {
           is_null( self::$instance ) AND self::$instance = new self;
           return self::$instance;
       }
     *
     */
    public static function admin_init();

    /**
     * Initializes Admin Options / Settings Page
     * Add your add_options_page() here
       public function admin_menu_init()
       {
           add_options_page(
               'CreativeArmoty Settings',
               'Creative Armory',
               'manage_options',
               'creativearmory_settings',
               array(
                   $this,
                   'settings_page'
               )
           );
       }
     * @return mixed
     */
    public function admin_menu_init();

    /**
     * Admin options / settings page html
     * Use this for the actual page layout of the settings page
     *
       public static function settings_page()
       {
          echo 'This is the page content';
       }
     * @return mixed
     */
    public static function settings_page();

    /**
     * Admin options / settings link on plugins page
       public static function settings_link()
       {
           $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=creativearmory_settings') ) .'">Settings</a>';
           $links[] = '<a href="https://creativearmory.com" target="_blank">More plugins by Creative Armory</a>';
           return $links;
       }
     *
     * @return mixed
     */
    public static function settings_link();

    /**
     *  this is where you should add db tables, if necessary
        public static function activation()
        {
            # restrict plugin to admins
            # you can add other restrictions here
            if ( ! current_user_can( 'activate_plugins' ) )
                return;
            $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
            check_admin_referer( "activate-plugin_{$plugin}" );
         }
     * @return mixed
     */
    public static function activation();

    /**
     *
        # the deactivation handler
        # flushes cache/temp
        # flushes permalinks
        # does NOT remove options or tables from db - that is what the uninstall hook does
        public static function deactivation()
        {
            if ( ! current_user_can( 'activate_plugins' ) )
                return;
            $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
            check_admin_referer( "deactivate-plugin_{$plugin}" );
        }
     *
     * @return mixed
     */
    public static function deactivation();

    /**
     *
        # the uninstaller script
        # flushes cache/temp
        # flushes permalinks
        # NOTE: use this if you've modified the database or wp_options in any way; otherwise not necessary
        public static function uninstall()
        {
            if ( ! current_user_can( 'activate_plugins' ) )
                return;
            check_admin_referer( 'bulk-plugins' );

            # Important: Check if the file is the one
            # that was registered during the uninstall hook.
            if ( __FILE__ != WP_UNINSTALL_PLUGIN )
                return;
         }
     * @return mixed
     */
    public static function uninstall();
}