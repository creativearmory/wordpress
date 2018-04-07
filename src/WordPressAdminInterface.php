<?php
/**
 * todo move this to its own repo and add via vendor/composer
 */
namespace CreativeArmory;


interface WordPressAdminInterface
{
    /**
     * @return mixed
     */
    public static function admin_init();

    /**
     * @return mixed
     */
    public function admin_menu_init();

    /**
     * @return mixed
     */
    public static function settings_page();

    /**
     * @return mixed
     */
    public static function settings_link();

    /**
     * @return mixed
     */
    public static function activation();

    /**
     * @return mixed
     */
    public static function deactivation();

    /**
     * @return mixed
     */
    public static function uninstall();
}