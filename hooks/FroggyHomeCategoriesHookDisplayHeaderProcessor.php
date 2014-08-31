<?php
/**
 * 2013-2014 Froggy Commerce
 *
 * NOTICE OF LICENSE
 *
 * You should have received a licence with this module.
 * If you didn't buy this module on Froggy-Commerce.com, ThemeForest.net
 * or Addons.PrestaShop.com, please contact us immediately : contact@froggy-commerce.com
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to benefit the updates
 * for newer PrestaShop versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    Froggy Commerce <contact@froggy-commerce.com>
 * @copyright 2013-2014 Froggy Commerce
 * @license   Unauthorized copying of this file, via any medium is strictly prohibited
 */

class FroggyHomeCategoriesHookDisplayHeaderProcessor extends FroggyHookProcessor
{
	public function run()
	{
		// Set media (different file CSS depending on PrestaShop version)
		$ps_version = substr(_PS_VERSION_, 0, 3);
		$this->context->controller->addCSS($this->path.'views/css/froggyhomecategories'.($ps_version == '1.6' ? '.bootstrap' : '').'.css', 'all');
		$this->context->controller->addJS($this->path.'views/js/froggyhomecategories'.($ps_version == '1.6' ? '.bootstrap' : '').'.js');
	}
}