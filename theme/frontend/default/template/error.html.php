{if isset($aPageSectionMenu) && count($aPageSectionMenu)}
<div class="page_section_menu{if !isset($aPageExtraLink.no_header_border)} page_section_menu_header{/if}">
	{if $aPageExtraLink !== null}
	<a href="{$aPageExtraLink.link}" class="page_section_menu_link">{$aPageExtraLink.phrase}</a>
	{/if}
	<ul>
	{foreach from=$aPageSectionMenu key=sPageSectionKey item=sPageSectionMenu name=pagesectionmenu}
		<li {if ($phpfox.iteration.pagesectionmenu == 1 && !$bPageIsFullLink) || ($bPageIsFullLink && $sPageSectionKey == $sPageCurrentUrl)} class="active"{/if}><a href="{if $bPageIsFullLink}{$sPageSectionKey}{else}#{/if}" {if !$bPageIsFullLink}rel="{$sPageSectionMenuName}_{$sPageSectionKey}"{/if}>{$sPageSectionMenu}</a></li>
	{/foreach}
	</ul>
	<div class="clear"></div>
</div>
{/if}
{section_menu_js}

{if $sPublicMessage && !is_bool($sPublicMessage)}
<div class="public_message" id="public_message">
	{$sPublicMessage}
</div>
<script type="text/javascript">
	$Behavior.template_error = function()
	{l}
		$('#public_message').show();
	{r};
</script>
{/if}
<div id="pem"><a href="#"></a></div>
<div id="core_js_messages">
{if count($aErrors)}
{foreach from=$aErrors item=sErrorMessage}
	<div class="error_message">{$sErrorMessage}</div>
{/foreach}
{unset var=$sErrorMessage var2=$sample}
{/if}
</div>
