<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>	
	{header}
	</head>
	<body>	
		<div id="global_ajax_message"></div>

		<a href="{url link=''}" id="back_to_site"><span class="icon"></span><span class="phrase">Back to site</span></a>
		<div id="top">
			<div class="main_holder">
				<div id="top_right">
					
					<div class="main_menu_holder">

						<div id="admincp_user">
							<div class="admincp_user_image">
								{img user=$aUserDetails suffix='_50_square' max_width=20 max_height=20}
							</div>
							<div class="admincp_user_content">
								{$aUserDetails.full_name|clean}
							</div>
						</div>

						<ul class="main_menu">
							<li><a href="{url link='admincp'}" class="main_menu_link n_dashboard">Dashboard</a></li>

							<li><a href="{url link='admincp.block'}" class="main_menu_link n_apps">Modules</a>
								<div class="main_sub_menu">
									{if (isset($aNewProducts) && count($aNewProducts))}
									<div class="main_sub_menu_holder_header">New Modules</div>
									<ul>
									{foreach from=$aNewProducts key=iKey item=aProduct}
										<li class="main_menu_link_li">
											<div class="new_product">
												<span>{$aProduct.title|clean}</span>
												<a href="{url link='admincp.product.file' install=$aProduct.product_id}" class="main_sub_action">Install</a>
											</div>
										</li>
									{/foreach}
									</ul>
									<div class="main_sub_menu_holder_header">Installed Modules</div>
									{/if}
									<ul>
										{foreach from=$aModulesMenu item=aModule}
										<li class="main_menu_link_li"><a class="main_menu_link{if (!$aModule.is_active)} not_active{/if}" href="{if (isset($aModule.no_index))}{url link=$aModule.no_index}{else}{url link="admincp."$aModule.module_id""}{/if}">{$aModule.app_name}</a></li>
										{/foreach}
									</ul>
								</div>
							</li>

							<li><a href="{url link='admincp.theme'}" class="main_menu_link n_themes">Themes</a></li>

							<li><a href="{url link='admincp.language.phrase'}" class="main_menu_link n_phrases">Phrases</a></li>

							<li>
								<a href="{url link='admincp.setting'}" class="main_menu_link n_settings">Settings</a>
								<div class="main_sub_menu">
									<ul>
										{foreach from=$setting_groups key=group_name item=setting}
										<li class="main_menu_link_li"><a class="main_menu_link" href="{if (isset($setting.url))}{url link=$setting.url}{else}{url link='admincp.setting.edit'}group-id_{$setting.group_id}/{/if}">{$group_name}</a></li>
										{/foreach}
									</ul>
								</div>
							</li>

							<li><a href="{url link='admincp.block'}" class="main_menu_link n_tools">Tools</a>
								<div class="main_sub_menu">
									{foreach from=$tools key=name item=items}
										<div class="main_sub_menu_holder_header">{phrase var=$name}</div>
										<ul>
											{foreach from=$items key=phrase item=link}
												<li class="main_menu_link_li"><a class="main_menu_link" href="{url link=$link}">{phrase var=$phrase}</a></li>
											{/foreach}
										</ul>
									{/foreach}
								</div>
							</li>

							{if (defined('MOXI9_IS_DEV'))}
							<li><a href="#" class="main_menu_link n_techie">Techie</a>
								<div class="main_sub_menu">
									{if !defined('MOXI9_IS_DEMO')}
									<a href="{url link='admincp.product.add'}" class="main_sub_action">New Product</a>

									<div class="main_sub_menu_holder_header">Manage</div>
									<ul>
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.product'}" class="main_sub_action">Products</a></li>
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.plugin'}" class="main_sub_action">Plugins</a></li>
									</ul>

									{/if}

									<div class="main_sub_menu_holder_header">Create</div>
									<ul>
										{if !defined('MOXI9_IS_DEMO')}
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.module.add'}" class="main_sub_action">New Module</a></li>
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.language.phrase.add'}">New Phrase</a></li>
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.setting.add'}">New Setting</a></li>
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.user.group.setting'}">New User Group Setting</a></li>
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.plugin.add'}">New Plugin</a></li>
										{/if}
										<li class="main_menu_link_li"><a class="main_menu_link" href="{url link='admincp.theme.add'}">New Theme</a></li>
									</ul>
								</div>
							</li>
							{/if}

							<li class="info"><span>CMS</span></li>
							<li><a href="{url link='admincp.page'}" class="main_menu_link n_content">Content</a></li>
							<li><a href="{url link='admincp.menu'}" class="main_menu_link n_menus">Menus</a></li>
							<li><a href="{url link='admincp.block'}" class="main_menu_link do_ajax n_blocks">Blocks</a></li>

							<li class="info"><span>Members</span></li>
							<li><a href="{url link='admincp.user.browse'}" class="main_menu_link n_search">Manage</a></li>
							<li><a href="{url link='admincp.user.group'}" class="main_menu_link n_user_groups">User Groups</a></li>
							<li><a href="{url link='admincp.user.promotion'}" class="main_menu_link n_promotions">Promotions</a></li>
							<li><a href="{url link='admincp.user.inactivereminder'}" class="main_menu_link n_inactive_members">Inactive Members</a></li>
							<li><a href="{url link='admincp.user.cancellations.feedback'}" class="main_menu_link n_cancel_feedback">Cancellation Feedback</a></li>
							<li><a href="{url link='admincp.subscribe.list'}" class="main_menu_link n_subscribe">Subscriptions</a></li>
						</ul>
					</div>					
									
				</div>
			</div>
		</div>
		
		<div id="main_body_holder"></div>
			<div class="main_holder">					
				<div id="js_content_container">					
					<div id="main">

						{if $iBreadTotal = count($aBreadCrumbs)}
						<div class="main_title_holder">
							{if count($aBreadCrumbs) == 1 && empty($aBreadCrumbTitle)}
							<div id="breadcrumb_list">
								<ul>
									{foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}
									<li><h1><a href="{$sLink}" class="{if $phpfox.iteration.link == '1'} first{/if}">{$sCrumb|clean}</a></h1></li>
									{/foreach}
								</ul>
							</div>
							{else}
							{if $iBreadTotal = count($aBreadCrumbs)}{/if}
							<div id="breadcrumb_list">
								<ul>
									{foreach from=$aBreadCrumbs key=sLink item=sCrumb name=link}
									{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle) && $aBreadCrumbTitle[0] == $sCrumb}

									{else}
									<li><a href="{$sLink}">{$sCrumb|clean}<span></span></a></li>
									{/if}
									{/foreach}
									<li>
										{if isset($aBreadCrumbTitle) && count($aBreadCrumbTitle)}
										<h1><a href="{$aBreadCrumbTitle[1]}">{$aBreadCrumbTitle[0]|clean}<span></span></a></h1>
										{/if}
									</li>
								</ul>
								<div class="clear"></div>
							</div>
							{/if}

						</div>
						{/if}

						{if isset($bIsModuleConnection) && $bIsModuleConnection && count($aActiveMenus)}
						<div id="breadcrumb_holder">
							<div id="breadcrumb_position">
								<ul id="breadcrumb_menu">
								{foreach from=$aActiveMenus key=sPhrase item=sLink}
									{if ($sPhrase == 'SPACE')}
									<li class="space"></li>
									{else}
									<li{if $sMenuController == $sLink} class="active"{/if}><a href="{url link=$sLink}">{if (defined('PHPFOX_ADMINCP_CUSTOM_MENU'))}{$sPhrase}{else}{phrase var=$sPhrase}{/if}</a></li>
									{/if}
								{/foreach}
								</ul>
							</div>
						</div>
						{/if}
						{if isset($bIsModuleConnection) && $bIsModuleConnection && count($aActiveMenus)}
							<div id="breadcrumb_content_holder">
						{/if}
							{error}
								{if (defined('PHPFOX_EXIT_PRODUCT'))}
								<div class="message">
									{if (isset($custom_exit_message))}
									{$custom_exit_message}
									{else}
									Trial versions do not have access to this section.
									{/if}
								</div>
								{else}
								{content}
								{/if}
						{if isset($bIsModuleConnection) && $bIsModuleConnection && count($aActiveMenus)}
							</div>
						{/if}
					</div>
				</div>		
				
				<div id="copyright">
					{param var='core.site_copyright'} {product_branding}
				</div>		
						
			</div>		
		{plugin call='theme_template_body__end'}	
        {loadjs}
	</body>
</html>