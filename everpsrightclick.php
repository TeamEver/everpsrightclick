<?php
/**
 * Project : everpsrightclick
 * @author Team Ever
 * @copyright Team Ever
 * @license   Tous droits réservés / Le droit d'auteur s'applique (All rights reserved / French copyright law applies)
 * @link http://team-ever.com
 */
 
if (!defined('_PS_VERSION_')) {
    exit;
}

class Everpsrightclick extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'everpsrightclick';
        $this->tab = 'front_office_features';
        $this->version = '1.0.1';
        $this->author = 'Team Ever';
        $this->need_instance = 0;

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('Ever PS Right Click');
        $this->description = $this->l('Block right click on front-office');

        $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    }

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        return parent::install() &&
            $this->registerHook('header');
    }

    public function uninstall()
    {
        return parent::uninstall();
    }

    /**
     * Add the CSS & JavaScript files you want to be added on the FO.
     */
    public function hookHeader()
    {
        $this->context->controller->addJS($this->_path.'/views/js/front.js');
    }
}
