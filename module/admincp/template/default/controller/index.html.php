<div id="pins">

	{if (isset($aNewProducts) && count($aNewProducts))}
	{foreach from=$aNewProducts key=iKey item=aProduct}
	<div class="block">
		<div class="title">
			{$aProduct.title|clean}
		</div>
		<div class="content">
			<a href="{url link='admincp.product.file' install=$aProduct.product_id}" class="main_sub_action">Install</a>
		</div>
	</div>
	{/foreach}
	{/if}

	{block location='2'}
	{block location='1'}
	{block location='3'}
</div>