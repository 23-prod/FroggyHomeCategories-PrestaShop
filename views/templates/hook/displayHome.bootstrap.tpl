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

<div id="froggyhomecategories-section">

	<ul class="nav nav-tabs clearfix">
        {foreach from=$froggyhomecategories.categories item=category key=k}
		    <li{if $k eq '0'} class="active"{/if}><a href="#froggyhomecategory-{$category->id_category}" data-toggle="tab">{$category->name}</a></li>
        {/foreach}
    </ul>

	<div class="tab-content">
        {foreach from=$froggyhomecategories.categories item=category key=k}
        <ul class="grid row homefeatured tab-pane{if $k eq '0'}  active{/if}" id="froggyhomecategory-{$category->id_category}">
            {foreach from=$category->children item=subcategory key=k}
			    <li class="col-xs-12 col-sm-4 col-md-3">
					<div class="froggyhomecategories-container-block">
						<div class="subcategory-image froggyhomecategories-img-container">
							<a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|escape:'html':'UTF-8'}" class="img">
								{if $subcategory.id_image}
									<img class="replace-2x" src="{$link->getCatImageLink($subcategory.link_rewrite, $subcategory.id_image, 'medium_default')|escape:'html':'UTF-8'}" alt="" />
									{else}
									<img class="replace-2x" src="{$img_cat_dir}default-medium_default.jpg" alt="" />
								{/if}
							</a>
						</div>
						<h5><a class="subcategory-name" href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'|truncate:350}">{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'|truncate:350}</a></h5>
						{if $subcategory.description}
							<div class="cat_desc"><a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" title="{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'|truncate:350}">{$subcategory.description|truncate:150:'...'}</a></div>
						{/if}
						<p><a href="{$link->getCategoryLink($subcategory.id_category, $subcategory.link_rewrite)|escape:'html':'UTF-8'}" class="button lnk_view btn btn-default" title="{$subcategory.name|truncate:25:'...'|escape:'html':'UTF-8'|truncate:350}"><span>{l s='View' mod='froggyhomecategories'}</span></a></p>
					</div>
                </li>
            {/foreach}
            {if empty($category->children)}<li>{l s='No subcategories for this category' mod='froggyhomecategories'}</li>{/if}
        </ul>
        {/foreach}
    </div>

</div>