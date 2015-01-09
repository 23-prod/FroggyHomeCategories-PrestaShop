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
	public $confirmation;

	public function processConfiguration()
	{
		if (Tools::isSubmit('FHC_CAT_SELECTION'))
		{
			Configuration::updateValue('FHC_CAT_SELECTION', json_encode(Tools::getValue('FHC_CAT_SELECTION')));
			$this->confirmation = true;
		}
	}

	public function renderForm()
	{
		$tree = $this->module->renderCategoriesTree(Category::getRootCategory()->id, 'FHC_CAT_SELECTION', 'FHC_CAT_SELECTION');

		$configuration = array(
			'key' => 'configuration',
			'label' => $this->module->l('Configuration'),
			'form' => array(
				'Options' => array(
					'label' => $this->module->l('Options'),
					'fields' => array(
						array('type' => 'custom', 'name' => 'FHC_CAT_SELECTION', 'label' => $this->module->l('Selected categories:'), 'html' => $tree),
					)
				),
			)
		);

		$helper = new FroggyHelperFormList();
		$helper->setFormUrl($this->module->configuration_url);
		$helper->setContext($this->context);
		$helper->setModule($this->module);
		$helper->setConfiguration($configuration);
		$helper->prefillFormFields();

		return $helper->render();
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
			'helper_display' => $this->renderForm(),
			'FHC_CAT_SELECTION' => json_decode(Configuration::get('FHC_CAT_SELECTION')),
		);
		if (isset($this->confirmation))
			$assign['form_result'] = $this->confirmation;

		$this->smarty->assign($this->module->name, $assign);

		// Render form
		return $this->module->fcdisplay(__FILE__, 'getContent.tpl');;
	}
}