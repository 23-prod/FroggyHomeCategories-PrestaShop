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

class FroggyHomeCategoriesHookGetContentProcessor extends FroggyHookProcessor
{
	public function processConfiguration()
	{
		if (Tools::isSubmit('FHC_CAT_SELECTION'))
		{
			Configuration::updateValue('FHC_CAT_SELECTION', json_encode(Tools::getValue('FHC_CAT_SELECTION')));
			$this->confirmation = 'ok';
		}
	}

	public function renderForm()
	{
		return $this->module->renderCategoriesTree(Category::getRootCategory()->id, 'FHC_CAT_SELECTION', 'FHC_CAT_SELECTION');
	}

	public function run()
	{
		// Post Process
		$this->processConfiguration();

		// Init var
		$ps_version = Tools::substr(_PS_VERSION_, 0, 3);
		$assign = array(
			'module_dir' => $this->path,
			'ps_version' => $ps_version,
			'FHC_CAT_SELECTION' => json_decode(Configuration::get('FHC_CAT_SELECTION')),
		);
		if (isset($this->confirmation))
			$assign['confirmation'] = 'ok';
		$this->smarty->assign($this->module->name, $assign);

		// Render form
		$html_form = $this->module->fcdisplay(__FILE__, 'getContent.tpl');
		if ($ps_version == '1.5' || $ps_version == '1.6')
			$html_form .= $this->renderForm();

		return $html_form;
	}
}