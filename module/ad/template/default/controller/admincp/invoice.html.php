<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: invoice.html.php 2029 2010-11-01 16:57:31Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<div id="admincp_search_panel">
	<form method="post" action="{url link='admincp.ad.invoice'}">
		<div class="table_header">
			{phrase var='ad.invoice_filter'}
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.status'}:
			</div>
			<div class="table_right">
				{$aFilters.status}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.display'}:
			</div>
			<div class="table_right">
				{$aFilters.display}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table">
			<div class="table_left">
				{phrase var='ad.sort_by'}:
			</div>
			<div class="table_right">
				{$aFilters.sort} {$aFilters.sort_by}
			</div>
			<div class="clear"></div>
		</div>
		<div class="table_clear">
			<input type="submit" name="search[submit]" value="{phrase var='core.submit'}" class="button" />
			<input type="submit" name="search[reset]" value="{phrase var='core.reset'}" class="button" />
		</div>
	</form>
</div>

<div id="admincp_search_content">
	{if !count($aInvoices)}
	<div class="extra_info">
		{phrase var='ad.there_are_no_invoices'}
	</div>
	{else}
	<div class="table_header">
		{phrase var='ad.invoices'}
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>{phrase var='ad.id'}</th>
			<th>{phrase var='ad.status'}</th>
			<th>{phrase var='ad.price'}</th>
			<th>{phrase var='ad.date'}</th>
			<th class="action_title">Actions</th>
		</tr>
		{foreach from=$aInvoices key=iKey item=aInvoice}
		<tr {if is_int($iKey/2)} class="tr"{/if}>
			<td>{$aInvoice.invoice_id}</td>
			<td>{$aInvoice.status_phrase}</td>
			<td>{$aInvoice.price|currency:$aInvoice.currency_id}</td>
			<td>{$aInvoice.time_stamp|date}</td>
			<td class="action_list">
				<a href="{url link='admincp.ad.invoice' delete=$aInvoice.invoice_id}" onclick="return confirm('{phrase var='admincp.are_you_sure' phpfox_squote=true}');" class="is_delete">{phrase var='ad.delete'}</a>
			</td>
		</tr>
		{/foreach}
	</table>
	<div class="table_clear"></div>

	{pager}

	{/if}
</div>