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
		// Define form
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->module->l('Froggy Home Categories configuration'),
					'image' => '../modules/'.$this->module->name.'/logo.gif',
					'icon' => 'icon-wrench'
				),
				'input' => array(
					array(
						'type' => 'categories',
						'label' => $this->module->l('Select categories to display on home:'),
						'name' => 'FHC_CAT_SELECTION',
						'tree' => array(
							'use_search' => false,
							'id' => 'categoryBox',
							'use_checkbox' => true,
							'selected_categories' => json_decode(Configuration::get('FHC_CAT_SELECTION')),
						),
						// Retrocompat 1.5 for category tree
						'values' => array(
							'trads' => array(
								'Root' => Category::getTopCategory()->name,
								'selected' => $this->module->l('Selected'),
								'Collapse All' => $this->module->l('Collapse All'),
								'Expand All' => $this->module->l('Expand All'),
								'Check All' => $this->module->l('Check All'),
								'Uncheck All' => $this->module->l('Uncheck All')
							),
							'selected_cat' => json_decode(Configuration::get('FHC_CAT_SELECTION')),
							'input_name' => 'FHC_CAT_SELECTION[]',
							'use_radio' => false,
							'use_search' => false,
							'disabled_categories' => array(),
							'top_category' => Category::getTopCategory(),
							'use_context' => true,
							'value' => json_decode(Configuration::get('FHC_CAT_SELECTION')),
						),

					),
				),
				'submit' => array('title' => $this->module->l('Save'))
			)
		);

		// Build form
		$helper = new HelperForm();
		$helper->table = $this->module->name;
		$helper->show_toolbar = false;
		$helper->default_form_language = (int)Configuration::get('PS_LANG_DEFAULT');
		$helper->allow_employee_form_lang = (int)Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG');
		$helper->submit_action = 'froggyhomecategories-submit';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->module->name.'&tab_module='.$this->module->tab.'&module_name='.$this->module->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array('languages' => $this->context->controller->getLanguages());

		// Render form
		return $helper->generateForm(array($fields_form));
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