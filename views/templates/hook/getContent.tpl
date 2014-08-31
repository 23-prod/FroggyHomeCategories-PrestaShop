{**
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
*  @author Froggy Commerce <contact@froggy-commerce.com>
*  @copyright  2013-2014 Froggy Commerce
*}

<h2 align="center">{l s='Froggy Home Categories' mod='froggyhomecategories'}</h2>

{if isset($froggyhomecategories.confirmation)}
    <div class="conf">{l s='The configuration has been successfully updated.' mod='froggyhomecategories'}</div>
{/if}


{*
<div class="bootstrap">
    <fieldset id="froggyhomecategories-fieldset">
            <legend><img src="{$froggyhomecategories.module_dir}logo.png" alt="" width="16" />{l s='Froggy Home Categories' mod='froggyhomecategories'}</legend>
            <div class="panel col-lg-5">
                <div id="froggyhomecategories-introduction-configuration">


                    <form action="" method="POST" class="defaultForm form-horizontal">
                        <div class="panel-heading">
                            {l s='Configuration' mod='froggyhomecategories'}
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3">
                                {l s='Select categories to display on home:' mod='froggyhomecategories'}
                            </label>
                            <div class="col-lg-9">

                            </div>
                        </div>
                        <p align="center"><input type="submit" class="btn btn-default" name="froggyhomecategories-submit" id="froggyhomecategories-submit" value="{l s='Validate' mod='froggyhomecategories'}" /></p>
                    </form>
                </div>
            </div>
    </fieldset>
</div>
</fieldset>
*}