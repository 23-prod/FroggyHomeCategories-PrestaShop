{**
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
*  @author Froggy Commerce <contact@froggy-commerce.com>
*  @copyright  2013-2015 Froggy Commerce
*}

<h2 align="center">{l s='Froggy Home Categories' mod='froggyhomecategories'}</h2>

{if isset($froggyhomecategories.form_result) && $froggyhomecategories.form_result === true}
<div class="conf">{l s='The new configuration has been saved!' mod='froggyhomecategories'}</div>
{/if}

{FroggyDisplaySafeHtml s=$froggyhomecategories.helper_display}
