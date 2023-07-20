<?php
/**
 * Copyright © Monsoon Consulting. All rights reserved.
 * See LICENSE_MONSOON.txt for license details.
 */

declare(strict_types=1);

namespace Magemen\QuickShop\Helper;

use Magemen\QuickShop\Block\Template;
use Magemen\QuickShop\Model\ConfigInterface;

/**
 * Class AddToCart
 */
class ProductList extends \Magento\Framework\App\Helper\AbstractHelper
{

    private $config;
    protected $_request;

    public function __construct(
        \Magento\Framework\App\Request\Http $request,
        ConfigInterface $config
    ) {
        $this->_request = $request;
        $this->config = $config;
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function _toHtml()
    {
        if (!$this->config->isQuickShopEnabled()) {
            $template = 'Magento_Catalog::product/list/item.phtml';
        }
        else {
            $template = 'Magemen_QuickShop::list_item.phtml';
        }
        return $template;

    }

    /**
     *
     * Render block HTML
     *
     * @return string
     */
    public function message()
    {
        if ($this->config->isQuickShopEnabled() && $this->config->isAjaxAddToCartEnabled()) {
            $template = '';
        }
        else {
            $template = 'Magento_Theme::messages.phtml';
        }
        return $template;

    }

    /**
     * Render block HTML
     *
     * @return string
     */
    public function slider()
    {
        if ($this->config->isQuickShopEnabled()) {
            $template="Magemen_QuickShop::product/slider/product-slider.phtml";
        }
        else {
            $template = "Magento_Catalog::product/slider/product-slider.phtml";
        }
        return $template;
    }

}
