{if Phpfox::getUserParam('shoutbox.can_add_shoutout')}
	<script type="text/javascript">
		{literal}
		function add_shoutout(obj) {
			if ($('#js_panel_shoutbox_input').val() == '') {
				return false;
			}

			$('#js_shoutbox_form').hide();
			$(obj).ajaxCall('shoutbox.add');
			$('#js_panel_shoutbox_input').val('');

			return false;
		}
		{/literal}
	</script>
	<form method="post" action="#" onsubmit="return add_shoutout(this);">
		<div class="shoutbox_form"><input id="js_panel_shoutbox_input" type="text" name="shoutout" size="20" maxlength="255" value="" placeholder="Write a shoutout..." autocomplete="off" /></div>
	</form>
{/if}

<div id="js_shoutbox_messages"></div>
{foreach from=$aShoutouts item=aShoutout key=iShoutCount name=shoutout}
	{template file='shoutbox.block.entry'}
{/foreach}