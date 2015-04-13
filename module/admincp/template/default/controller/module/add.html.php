<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: add.html.php 979 2009-09-14 14:05:38Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<script type="text/javascript">
{literal}
function isMenu(bNoSpeed)
{
	if ($('#js_select_menu').val() == '0')
	{
		$('#js_add_menu_div').hide();
		return true;
	}
	
	$('#js_add_menu_div').show();
	return true;
}
{/literal}
</script>
{$sCreateJs}
<form method="post" action="{url link="admincp.module.add"}" id="js_form" onsubmit="{$sGetJsForm}">
{if $bIsEdit}
<div><input type="hidden" name="module_id" value="{$aForms.module_id}" /></div>
{/if}

<div class="table">
	<div class="table_left">
		Name:
	</div>
	<div class="table_right">
		<input type="text" name="val[app_name]" value="{value type='input' id='app_name'}" size="40" id="app_name" maxlength="75" />
	</div>
	<div class="clear"></div>
</div>

<div class="table">
	<div class="table_left">
		{phrase var='admincp.product'}:
	</div>
	<div class="table_right">
		<select name="val[product_id]">
		{foreach from=$aProducts item=aProduct}
			<option value="{$aProduct.product_id}" {value type='select' id='product_id' default=$aProduct.product_id}>{$aProduct.title}</option>
		{/foreach}
		</select>
		{help var='admincp.module_add_product'}
	</div>
	<div class="clear"></div>
</div>
<div class="table" style="display:none;">
	<div class="table_left">
		{phrase var='admincp.core_module'}:
	</div>
	<div class="table_right">
		<label><input type="radio" name="val[is_core]" style="vertical-align:bottom;" value="1" {value type='radio' id='is_core' default='1'} />{phrase var='admincp.yes'}</label>
		<label><input type="radio" name="val[is_core]" style="vertical-align:bottom;" value="0" {value type='radio' id='is_core' default='0' selected=true} />{phrase var='admincp.no'}</label>
		{help var='admincp.module_add_core'}
	</div>
	<div class="clear"></div>
</div>
<div class="table">
	<div class="table_left">
		{phrase var='admincp.module_id'}:
	</div>
	<div class="table_right">
	{if $bIsEdit}
		<div><input type="hidden" name="val[module_id]" value="{value type='input' id='module_id'}" size="40" id="name" maxlength="75" /></div>
		{$aForms.module_id|translate:'module'}
	{else}
		<input type="text" name="val[module_id]" value="{value type='input' id='module_id'}" size="40" id="name" maxlength="75" />	
		{help var='admincp.module_add_name'}
	{/if}
	</div>
	<div class="clear"></div>
</div>
<div class="table" style="display:none;">
	<div class="table_left">
		{phrase var='admincp.add_menu'}:
	</div>
	<div class="table_right">
		<select name="val[is_menu]" id="js_select_menu" onchange="isMenu();">
			<option value="1" {value type='select' id='is_menu' default=1}>{phrase var='admincp.yes'}</option>
			<option value="0" {value type='select' id='is_menu' default=0}>{phrase var='admincp.no'}</option>
		</select>
		{help var='admincp.module_add_is_menu'}
	</div>
	<div class="clear"></div>
</div>
<div class="table" id="js_add_menu_div">
	<div class="table_left">
		{phrase var='admincp.sub_menu'}:
	</div>
	<div class="table_right">
		<script type="text/javascript">
		function addMore() {l}
			var iCnt = (parseInt($('#js_add_more_count').html()) + 1);
			var sHtml = '<div class="p_4" id="js_new_content' + iCnt + '">{phrase var='admincp.phrase'}: <input type="text" name="val[menu][' + iCnt + '][phrase]" value="" /> {phrase var='admincp.link'}: <input type="text" name="val[menu][' + iCnt + '][link]" value="" /> [ <a href="#" onclick="$(\\'#js_new_content' + iCnt + '\\').html(\\'\\'); return false;">{phrase var='admincp.remove'}</a> ]</div>';
			$('#js_add_more_div').append(sHtml);
			$('#js_add_more_count').html(iCnt);
		{r}
		</script>
		{for $i = 0; $i <= $iMenus; $i++}		
		{if $bIsEdit && isset($aMenus[$i].var_name)}
		<div id="jsmenu_{$aMenus[$i].var_name}">
		 <input type="hidden" name="val[menu][{$i}][phrase_var]" value="{$aMenus[$i].var_name}" />
		{/if}
		<div class="p_4">{phrase var='admincp.phrase'}: <input type="text" name="val[menu][{$i}][phrase]" value="{if isset($aMenus[$i].phrase)}{$aMenus[$i].phrase|clean}{/if}" /> {phrase var='admincp.link'}: <input type="text" name="val[menu][{$i}][link]" value="{if isset($aMenus[$i].phrase)}{$aMenus[$i].link|clean}{/if}" />{if $bIsEdit && isset($aMenus[$i].var_name)} <a href="#?call=admincp.module.deleteMenu&amp;var={$aMenus[$i].var_name}&amp;id={$aForms.module_id}" class="delete_link">{phrase var='admincp.delete'}</a>{/if}</div>
		{if $bIsEdit && isset($aMenus[$i].var_name)}
		</div>
		{/if}
		{/for}		
		<div id="js_add_more_div"></div>
		<div id="js_add_more_count" style="display:none;">{$iMenus}</div>
		<div class="p_4" style="padding-left:50px;">
			<a href="#" onclick="addMore(); return false;">{phrase var='admincp.add_more'}</a>
		</div>
		{help var='admincp.module_add_menu'}
	</div>
	<div class="clear"></div>
</div>
<div class="table_clear">
	<input type="submit" value="{phrase var='admincp.submit'}" class="button" />
</div>
</form>
<script type="text/javascript">
	Core.action.on_module_edit = function() {l}
		isMenu(true);
	{r};
</script>

{if $bIsEdit && $aForms.is_active}
<ul class="manage_module">
	<li><a href="{url link='admincp.module.add' id=$aForms.module_id active=0}">Disable Module</a></li>
	{if (!$aForms.is_core)}
	<li><a href="{url link='admincp.product' delete=$aForms.product_id}">Uninstall Module</a></li></li>
	{/if}
</ul>
{/if}