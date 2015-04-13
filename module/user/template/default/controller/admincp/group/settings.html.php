<form method="post" action="#" onsubmit="$Core.ajaxMessage(); $(this).ajaxCall('user.updateSettings'); return false;">
	<table class="user_group_settings">
		<tr>
		{foreach from=$settings item=setting}
			<th>{$setting.group.title}</th>
		{/foreach}
		</tr>
		<tr>
			{foreach from=$settings item=setting}
			<td>
			{foreach from=$setting.settings item=aProduct}
			{foreach from=$aProduct key=sKey item=aSetting}
			{foreach from=$aSetting name=setting_key item=aItem}
			{if ($setting.group === false)}
				<div class="setting_item setting_title" data-row="{$phpfox.iteration.setting_key}">
					{$aItem.setting_name}
				</div>
					{else}
				<div class="setting_item setting_values st_row_{$phpfox.iteration.setting_key}">
					<a name="setting{$aItem.setting_id}"></a>
					{if in_array($aItem.name,$aCurrency) == true || isset($aItem.isCurrency)}
					<input type="hidden" name="val[{$setting.group.user_group_id}][sponsor_setting_id_{$aItem.setting_id}]" value="{$aItem.setting_id}" />
					{module name='core.currency' currency_field_name='val[{$setting.group.user_group_id}][value_actual]['$aItem.setting_id']'}
					{elseif $aItem.type_id == 'big_string'}
					<textarea cols="60" rows="8" name="val[{$setting.group.user_group_id}][value_actual][{$aItem.setting_id}]">{$aItem.value_actual}</textarea>
					{elseif ($aItem.type_id == 'integer' || $aItem.type_id == 'string')}
					<input type="text" name="val[{$setting.group.user_group_id}][value_actual][{$aItem.setting_id}]" value="{$aItem.value_actual}" size="25" onclick="this.select();" />
					{elseif ($aItem.type_id == 'boolean')}
					<div class="item_is_active_holder">
									<span class="js_item_active item_is_active">
										<input type="radio" class="radio_yes" name="val[{$setting.group.user_group_id}][value_actual][{$aItem.setting_id}]" value="1" {if $aItem.value_actual == true || $aItem.value_actual == "1"}data-it="1yes" checked="checked" {/if}/> {phrase var='user.yes'}
									</span>
									<span class="js_item_active item_is_not_active">
										<input type="radio" class="radio_no" name="val[{$setting.group.user_group_id}][value_actual][{$aItem.setting_id}]" value="0" {if !$aItem.value_actual}checked="checked" {/if}/> {phrase var='user.no'}
									</span>
					</div>
					{elseif ($aItem.type_id == 'array')}
					<input type="text" name="val[{$setting.group.user_group_id}][value_actual][{$aItem.setting_id}]" value="{foreach from=$aItem.value_actual name=arraysetting item=aValueActual}{if $phpfox.iteration.arraysetting != 1},{/if}{$aValueActual}{/foreach}" />
					{/if}
				</div>
			{/if}
			{/foreach}
			{/foreach}
			{/foreach}
			</td>
		{/foreach}
		</tr>
	</table>
	<div class="table_clear table_hover_action_custom table_hover_action">
		<span id="js_setting_saved"></span> <input type="submit" value="{phrase var='user.save'}" class="button" />
	</div>
</form>