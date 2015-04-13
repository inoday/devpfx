<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>	
		{header}
	</head>
	<body>
		<div id="main">
			<div id="header">
				<a href="http://moxi9.com/phpfox" id="logo" target="_blank">PHPfox</a>
				<span id="version">{$product_version}</span>
			</div>

			{if $sPublicMessage}
			<div class="public_message" id="public_message">
				{$sPublicMessage}
			</div>
			<script type="text/javascript">
				$Behavior.theme_install_template = function()
				{l}
				$('#public_message').show('slow');
				{r};
			</script>
			{/if}
			<div id="core_js_messages">
				{if count($aErrors)}
				{foreach from=$aErrors item=sErrorMessage}
				<div class="error_message">{$sErrorMessage}</div>
				{/foreach}
				{unset var=$sErrorMessage }
				{/if}
			</div>
			{layout file=$sTemplate}
		</div>
		{loadjs}
		<script type="text/javascript">
			$Core.init();
		</script>
	</body>
</html>