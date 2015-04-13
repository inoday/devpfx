{plugin call='page.template_controller_view_start'}

{$aPage.text_parsed}

{if Phpfox::getUserParam('page.can_manage_custom_pages') && Phpfox::getUserParam('admincp.has_admin_access')}
<div class="p_4 t_right">
	<a href="{url link='admincp.page.add' id=$aPage.page_id}">{phrase var='page.edit'}</a>	
	- <a href="{url link='admincp.page' delete=$aPage.page_id}" class="sJsConfirm">{phrase var='page.delete'}</a>
</div>

{/if}

{plugin call='page.template_controller_view_end'}