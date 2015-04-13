<ul class="acp_tips">
{foreach from=$tips name=cnt item=tip}
	<li>
		<a href="{$tip.url}">
			<span class="icon">{$phpfox.iteration.cnt}</span> {$tip.title}
		</a>
	</li>
{/foreach}
</ul>
<div class="clear"></div>