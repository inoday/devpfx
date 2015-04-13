<div id="admincp_theme_manage">
	<ul>
		<li class="name"><a href="{url link='admincp.theme'}">{$aTheme.name|clean}</a></li>
		{foreach from=$theme_menus item=theme_menu}
		<li><a href="{$theme_menu.link}"{if ($theme_menu.is_active)} class="active"{/if}>{$theme_menu.name}</a></li>
		{/foreach}
		<li class="hide first"><a href="#" onclick="$Core.ajaxMessage('Setting as default theme...'); $.ajaxCall('theme.setDefault', '&id={$aTheme.theme_id}&global_ajax_message=true'); $('.theme_drop').hide(); return false;">Set as Default</a></li>
		<li class="hide"><a href="{url link='admincp.theme.add' id=$aTheme.theme_id}">Edit Settings</a></li>
		{if ($aTheme.folder != 'unity' && $aTheme.folder != 'default')}
		<li class="hide"><a href="{url link='admincp.theme.export' theme=$aTheme.theme_id}">Export to Unity</a></li>
		{/if}
	</ul>
</div>


<div id="content_editor_holder">
	<div id="admincp_theme_content">

		{if ($type == 'css')}
		<form method="post" action="{url link='current'}" id="js_template_form" onsubmit="$Core.ajaxMessage(); $('#js_last_modified').show(); $('#js_template_content_text').val(editAreaLoader.getValue('editor')); $(this).ajaxCall('theme.saveCssFile', 'global_ajax_message=true'); return false;">
			<div id="js_hidden_cache">
				<div><input type="hidden" name="val[style_id]" value="{$aStyle.style_id}" id="js_css_style_id" /></div>
				<div><input type="hidden" name="val[file_name]" value="custom.css" id="js_css_file" /></div>
				<div><input type="hidden" name="val[module_id]" value="" id="js_css_module" /></div>
			</div>
			<div style="display:none;"><textarea cols="50" rows="15" name="val[css_data]" id="js_template_content_text">{$aCustomDataContent}</textarea></div>
			<div id="js_content_edit_area" style="display:none;">

				<div id="editor">{$aCustomDataContent}</div>
				<div id="content_editor_submit">
					<ul>
						<li><input type="submit" value="{phrase var='core.save'}" class="button" id="js_update_template" /></li>
						<li id="js_last_modified"><input type="button" value="{phrase var='theme.revert'}" class="button button_off" id="js_revert" onclick="return $Core.cssEditor.revert();" /></li>
					</ul>
					<div id="js_last_modified_info">{if isset($aCustomDataContent.time_stamp)}{$aCustomDataContent.time_stamp|date}{/if}</div>

				</div>
			</div>

		</form>
		{elseif ($type == 'images')}
		<div id="drop_holder_themes" data-upload-url="{url link='admincp.theme.manage' id=$aTheme.theme_id upload='1'}">
			<span class="drag_icon"></span>
			<ul class="theme_images">
			{foreach from=$images item=image}
				<li data-url="{$image.url}">{$image.name}</li>
			{/foreach}
			</ul>
			<div id="droppable" data-url="{url link='admincp.theme.manage' id=$aTheme.theme_id delete='1'}">
				<span class="trash_icon"></span>
			</div>
		</div>
		{elseif ($type == 'js')}

		<form method="post" action="{url link='current'}" id="js_script_save">
			<div id="js_hidden_cache">
				<div><input type="hidden" name="val[theme_id]" value="{$aTheme.theme_id}" /></div>
			</div>
			<div style="display:none;"><textarea cols="50" rows="15" name="val[css_data]" id="js_template_content_text">{$js_content|clean}</textarea></div>
			<div id="js_content_edit_area" style="display:none;">

				<div id="editor">{$js_content|clean}</div>
				<div id="content_editor_submit">
					<ul>
						<li><input type="submit" value="{phrase var='core.save'}" class="button" /></li>
					</ul>
				</div>
			</div>

		</form>

		{else}
		<div id="content_editor_menu">
			<ul>
				{foreach from=$templates key=sType name=type item=aTemplate}
				{if $sType == 'layout'}
				<li class="active"><a href="#" class="menu_parent js_open_template_list first{if isset($aTemplate.modified)} modified{/if}"><span class="folder"></span>{phrase var='theme.global_templates'}</a>
					<ul class="js_list_templates">
						{foreach from=$aTemplate.files item=sFile}
						<li><a href="#?type=layout&amp;name={if is_array($sFile)}{$sFile.0}{else}{$sFile}{/if}&amp;theme={$aTheme.folder}" class="js_get_template_file{if is_array($sFile)} modified{/if}"><div style="position:absolute; right:0; display:none;">{img theme='ajax/small.gif'}</div><span class="file"></span>{if is_array($sFile)}{$sFile.0}{else}{$sFile}{/if}</a></li>
						{/foreach}
					</ul>
				</li>
				{else}
				<li><a href="#" class="menu_parent js_open_template_list{if isset($aTemplate.modified)} modified{/if}"><span class="folder"></span>{$sType}</a>
					<ul class="js_list_templates" style="display:none;">
						{foreach from=$aTemplate item=aModules}
						{if isset($aTemplate.controller) && count($aTemplate.controller)}
						<li><span class="title">{phrase var='theme.controllers'}</span>
							<ul>
								{foreach from=$aTemplate.controller item=sController}
								<li>
									<a href="#?type=controller&amp;name={if is_array($sController)}{$sController.0}{else}{$sController}{/if}&amp;theme={$aTheme.folder}&amp;module={$sType}" class="js_get_template_file{if is_array($sController)} modified{/if}"><div style="position:absolute; right:0; display:none;">{img theme='ajax/small.gif'}</div><span class="file"></span>{if is_array($sController)}{$sController.0}{else}{$sController}{/if}
									</a>
								</li>
								{/foreach}
								{unset var=$aTemplate.controller}
							</ul>
						</li>
						{/if}
						{if isset($aTemplate.block) && count($aTemplate.block)}
						<li><span class="title">{phrase var='theme.blocks'}</span>
							<ul>
								{foreach from=$aTemplate.block item=sBlock}
								<li><a href="#?type=block&amp;name={if is_array($sBlock)}{$sBlock.0}{else}{$sBlock}{/if}&amp;theme={$aTheme.folder}&amp;module={$sType}" class="js_get_template_file{if is_array($sBlock)} modified{/if}"><div style="position:absolute; right:0; display:none;">{img theme='ajax/small.gif'}</div><span class="file"></span>{if is_array($sBlock)}{$sBlock.0}{else}{$sBlock}{/if}</a></li>
								{/foreach}
								{unset var=$aTemplate.block}
							</ul>
						</li>
						{/if}
						{/foreach}
					</ul>
				</li>
				{/if}
				{/foreach}
			</ul>
		</div>

		<div id="content_editor_text">
			<div class="content_editor_overlay" id="js_template_content_loader"></div>
			<form method="post" action="{url link='current'}" id="js_template_form">
				<div id="js_hidden_cache">
					<div><input type="hidden" name="val[type]" value="" id="js_template_type" /></div>
					<div><input type="hidden" name="val[theme]" value="" id="js_template_theme" /></div>
					<div><input type="hidden" name="val[name]" value="" id="js_template_name" /></div>
					<div><input type="hidden" name="val[module]" value="" id="js_template_module" /></div>
				</div>
				<div style="display:none;"><textarea cols="50" rows="15" name="val[text]" id="js_template_content_text" style="width:100%;"></textarea></div>
				<div id="js_content_edit_area" style="display:none;">
					<div id="editor"></div>
					<div id="content_editor_submit">
						<ul>
							<li><input type="button" value="{phrase var='core.save'}" class="button" id="js_update_template" />	</li>
							<li id="js_last_modified"><input type="button" value="{phrase var='theme.revert'}" class="button button_off" id="js_revert" /></li>
						</ul>

						<div style="display:none;">
							{phrase var='admincp.product'}:
							<select name="val[product_id]" id="js_template_product_id">
								{foreach from=$aProducts item=aProduct}
								<option value="{$aProduct.product_id}">{$aProduct.title}</option>
								{/foreach}
							</select>
						</div>
						<div id="js_last_modified_info"></div>

					</div>
				</div>
			</form>
		</div>
		{/if}

	</div>
</div>