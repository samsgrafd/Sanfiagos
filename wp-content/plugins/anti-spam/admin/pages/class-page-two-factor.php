<?php

namespace WBCR\Titan\Page;

use WBCR\Titan\Plugin;

if ( ! defined('ABSPATH')) {
    exit;
}

class TwoFactor extends Base
{
    /**
     * The id of the page in the admin menu.
     *
     * Mainly used to navigate between pages.
     * @see FactoryPages435_AdminPage
     *
     * @since 1.0.0
     * @var string
     */
    public $id = "tfa_settings";

    public $type = 'page';

    /**
     * @var string
     */
    public $page_menu_dashicon = 'dashicons-admin-network';

    /**
     * @var bool
     */
    public $show_right_sidebar_in_options = false;

    /**
     * @var object|\WBCR\Titan\Views
     */
    public $view;

    /**
     * @param  Plugin  $plugin
     */
    public function __construct($plugin)
    {
        $this->menu_title                  = __('Two-factor', 'two-factor-auth');
        $this->page_menu_short_description = __('Two-factor authentication', 'two-factor-auth');

        $this->view = \WBCR\Titan\Plugin::app()->view();

        parent::__construct($plugin);
    }

    public function getMenuTitle() {
        return parent::getMenuTitle(); // TODO: Change the autogenerated stub
    }

    /**
     * Requests assets (js and css) for the page.
     *
     * @return void
     * @since 1.0.0
     * @see Wbcr_FactoryPages435_AdminPage
     *
     */
    public function assets($scripts, $styles)
    {
        parent::assets($scripts, $styles);

        if (defined('WBCR_CLEARFY_PLUGIN_ACTIVE')) {
            /** @noinspection PhpUndefinedConstantInspection */
            $this->styles->add(WCL_PLUGIN_URL.'/admin/assets/css/general.css');
        }

        if(defined('WTITAN_PLUGIN_URL')) {
            $this->styles->add( WTITAN_PLUGIN_URL . '/admin/assets/css/titan-security.css' );
        }

        $this->styles->add(WTITAN_PLUGIN_URL . '/admin/assets/css/firewall/firewall-dashboard.css');
        $this->styles->add(WTITAN_PLUGIN_URL . '/admin/assets/css/dashboard-dashboard.css');
        $this->styles->add(WTITAN_PLUGIN_URL . '/admin/assets/css/2fa.css');

//        $this->scripts->add(WTFA_PLUGIN_URL.'/admin/assets/2fa.js', ['jquery']);
        $this->scripts->localize('wtitan', [
            'registerApp'       => wp_create_nonce('wtfa-register-2fa-app'),
            'remove2fa'         => wp_create_nonce('wtfa-remove-2fa-app'),
            'generateRestore'   => wp_create_nonce('wtfa-generate-restore-codes'),
            'updateIpWhitelist' => wp_create_nonce('wtfa-update-ip-whitelist'),
            'change2faState'    => wp_create_nonce('wtfa-change-2fa-state'),
            'refreshQrCode'     => wp_create_nonce('wtfa-reload-qr-code'),
        ]);


//		add_filter('wbcr/factory/pages/impressive/actions_notice', array($this, 'actionNotices'));
    }

    public function showPageContent()
    {
        $user_list = get_users();
        $this->view->print_template( 'two-factor', compact('this', 'user_list'));
    }
}
