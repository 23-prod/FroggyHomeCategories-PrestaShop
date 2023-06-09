<?php
/**
 * 2013-2015 Froggy Commerce
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
 * @copyright 2013-2015 Froggy Commerce
 * @license   Unauthorized copying of this file, via any medium is strictly prohibited
 */

/*
 * Security
 */
defined('_PS_VERSION_') || require dirname(__FILE__).'/index.php';

/*
 * Include Froggy Library
 */
if (!class_exists('FroggyModule', false)) require_once dirname(__FILE__).'/froggy/FroggyModule.php';

class FroggyHomeCategories extends FroggyModule
{
	/**
	 * @var array contains error form postProcess()
	 */
	protected $errors = array();

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->name = 'froggyhomecategories';
		$this->version = '1.0.1';
		$this->author = 'Froggy Commerce';
		$this->tab = 'front_office_features';

		parent::__construct();

		$this->displayName = $this->l('Froggy Home Categories');
		$this->description = $this->l('Allow you to display a selection of categories');
		$this->module_key = 'e08f3e47799d094e2bf57cfe60345f4d';
	}

	/**
	 * {@inheritdoc}
	 */
	public function getContent()
	{
		return $this->hookGetContent(array());
	}

	/*
	 * Retrocompat 1.4
	 */
	public function hookHeader($params)
	{
		return $this->hookDisplayHeader($params);
	}
	public function hookHome($params)
	{
		return $this->hookDisplayHome($params);
	}
}
