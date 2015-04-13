<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: add.html.php 6839 2013-10-31 18:23:03Z Fern $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !$iPlacementCount}
	<div class="message">
		{phrase var='ad.no_ad_placements_have_been_created_check_back_here_shortly'}
	</div>
{else}
	{if $bIsEdit}
		<form method="post" action="{url link='ad.add' id=$aForms.ad_id}">
			<div><input type="hidden" name="val[id]" value="{$aForms.ad_id}" /></div>
			<div class="main_break">
				<div class="table">
					<div class="table_left">
						{phrase var='ad.campaign_name'}:
					</div>
					<div class="table_right">
						<input type="text" name="val[name]" value="{value type='input' id='name'}" size="25" id="name" />
					</div>
					<div class="clear"></div>
				</div>	
				
				{template file='ad.block.targetting'}
				<div class="table_clear">
					<input type="submit" value="{phrase var='ad.submit'}" class="button" />
				</div>		
			</div>
		</form>
	{else}
		{if $bCompleted}
			<div class="main_break"></div>
			{if isset($bIsFree) && $bIsFree == true}
				<div class="message">
					{phrase var='ad.your_ad_has_been_created'}
				</div>
			{else}
				<div class="message">
					{phrase var='ad.your_ad_has_successfully_been_submitted_to_complete_the_process_continue_with_paying_below'}
				</div>
				<h3>{phrase var='ad.payment_methods'}</h3>
				{module name='api.gateway.form'}
			{/if}
			
		{else}
			<div id="js_upload_image_holder_frame" style="z-index:999; background:#fff;">	
				<div id="js_upload_image_holder" style="z-index:999;" class="ajax_link_reset">
					<form method="post" action="{url link='ad.image'}" target="upload_ad_iframe" enctype="multipart/form-data">			
						<div><input type="hidden" name="ad_size" value="728x90" id="js_upload_ad_size" /></div>
						<input id="js_form_upload_file" type="file" name="image" onchange="$('#js_upload_image_holder').hide(); $('#js_image_holder_message').show(); $(this).parent('form').submit();$('#js_upload_image_holder_frame').hide();$('#link_show_image_uploader').hide();" />
					</form>
				</div>
				<iframe framewidth="400" frameheight="200" name="upload_ad_iframe" id="upload_ad_iframe" style="display:none;"></iframe>
			</div>	

			<form method="post" action="{url link='ad.add'}" id="js_custom_ad_form" enctype="multipart/form-data">
				<div><input type="hidden" name="val[image_path]" value="{value type='input' id='image_path'}" id="js_image_id" /></div>	
				<div><input type="hidden" name="val[type_id]" value="{value type='input' id='type_id' default='2'}" id="type_id" /></div>	
				<div><input type="hidden" name="val[color_bg]" value="{value type='input' id='color_bg' default='fff'}" id="js_colorpicker_drop_bg" /></div>
				<div><input type="hidden" name="val[color_border]" value="{value type='input' id='color_border' default='bcccd1'}" id="js_colorpicker_drop_border" /></div>
				<div><input type="hidden" name="val[color_text]" value="{value type='input' id='color_text' default='1280c9'}" id="js_colorpicker_drop_text" /></div>
				<div><input type="hidden" name="val[ad_size]" value="{value type='input' id='ad_size'}" id="js_upload_ad_size_find" /></div>
				<div style="display:none;"><textarea cols="40" rows="6" name="val[html_code]" id="html_code">{value type='textarea' id='html_code'}</textarea></div>

				<div id="js_sample_multi_ad_holder">
					<div class="ad_unit_holder_title">Sample Ad</div>
					<div class="ad_unit_multi_ad">
						<div class="ad_unit_multi_ad_title"></div>
						<div class="ad_unit_multi_ad_url"></div>
						<div class="ad_unit_multi_ad_content">
							<div class="ad_unit_multi_ad_image js_ad_image"></div>
							<div class="ad_unit_multi_ad_text"></div>
						</div>

					</div>
				</div>

				<div id="step_1">
					<h3 style="margin-top:0px;">{phrase var='ad.1_ad_design'}</h3>

					<div id="multi_ad_enabled">
						<input type="hidden" name="val[location]" id="location" value="50" />
					</div>
					<div><input type="hidden" name="val[block_id]" value="50" id="js_block_id" /></div>
					
					<div id="js_create_ad" class="hide_sub_block">
						
						<div class="table">
							<div class="table_left">
								{phrase var='ad.title'}:
							</div>
							<div class="table_right">
								<input type="text" name="val[title]" value="{value type='input' id='title'}" size="40" maxlength="40" id="title" />
								<div id="js_ad_title_form_limit" class="extra_info">
									40 character limit.
								</div>
							</div>
							<div class="clear"></div>
						</div>	
						<div class="table">
							<div class="table_left">
								{phrase var='ad.body_text'}:
							</div>
							<div class="table_right">
								<textarea cols="40" rows="6" name="val[body_text]" id="body_text">{value type='textarea' id='body_text'}</textarea>
								<div id="js_ad_body_text_form_limit" class="extra_info">
									{phrase var='ad.135_character_limit'}
								</div>
							</div>
							<div class="clear"></div>
						</div>			
						
						<div class="table">
							<div class="table_left">
								{if Phpfox::getParam('ad.multi_ad')}
									{phrase var='ad.image'}:
								{else}
									{phrase var='ad.image_optional'}:
								{/if}
							</div>
							<div class="table_right">
								<a href="#" id="link_show_image_uploader" style="z-index:1;" onclick="var thisPosition = $(this).position(); $('#js_upload_image_holder_frame').css({l}'top': thisPosition.top + 'px', 'left': '0px', 'z-index': '1000px'{r}); $('#js_upload_image_holder_frame').show(); return false;"> {phrase var='ad.choose_image'} </a>
								<div id="js_image_holder"></div>
								<div id="js_image_holder_link" style="display:none;">
									<a href="#">{phrase var='ad.change_image'}</a>
								</div>
								<div id="js_image_holder_message" style="display:none;">{img theme='ajax/small.gif'}</div>
								<div class="extra_info" style="padding-top:35px;">				
									<div id="js_image_error" style="display:none;">
										<div class="error_message" style="width:60%;">
											{phrase var='ad.we_only_accept_the_following_extensions_gif_jpg_and_png'}
										</div>
									</div>
									{phrase var='ad.supported_extensions_gif_jpg_and_png'}
									{if Phpfox::getParam('ad.multi_ad')}
									&middot; Recommended image dimensions are 75x75 pixels.
									{/if}
								</div>
							</div>
							<div class="clear"></div>
						</div>		
					</div>
					
					<div id="js_upload_ad" class="hide_sub_block" style="display:none;">
						<div class="table">
							<div class="table_left">
								{phrase var='ad.image'}:
							</div>
							<div class="table_right">
								<input type="file" name="image" />
								<div class="extra_info">				
									{phrase var='ad.supported_extensions_gif_jpg_and_png'}		
								</div>
							</div>
							<div class="clear"></div>
						</div>			
					</div>
					
					
					
					<div class="table">
						<div class="table_left">
							{phrase var='ad.destination_url'}:
						</div>
						<div class="table_right">
							<input type="text" name="val[url_link]" value="{value type='input' id='url_link'}" size="50" id="url_link" />
							<div class="extra_info">
								{phrase var='ad.example_http_www_yourwebsite_com'}
							</div>
						</div>
						<div class="clear"></div>
					</div>	
					
					<div class="table_clear" id="js_ad_continue_form_button">
						<input type="button" value="{phrase var='ad.continue'}" class="button" id="js_ad_continue_form" />
					</div>	
				</div>
				<div id="js_ad_continue_next_step" style="display:none;">
					<div class="main_break"></div>
					
					<h3>{phrase var='ad.2_targeting'}</h3>
					
					<div class="main_break"></div>
					
					{template file='ad.block.targetting'}
					
					<div class="main_break"></div>
					
					<h3>{phrase var='ad.3_campaigns_and_pricing'}</h3>
					
					<div class="main_break"></div>
					
					<div class="table">
						<div class="table_left">
							{phrase var='ad.campaign_name'}:
						</div>
						<div class="table_right">
							<input type="text" name="val[name]" value="{value type='input' id='name'}" size="25" id="name" />
						</div>
						<div class="clear"></div>
					</div>		
					
					<div class="table">
						<div class="table_left">
							<span id="js_ad_cpm"></span>
						</div>
						<div class="table_right">
							<div><input type="hidden" name="val[ad_cost]" value="" size="15" id="js_total_ad_cost" /></div>
							<div><input type="hidden" name="val[is_cpm]" value="" size="15" id="js_is_cpm" /></div>
							<input type="text" name="val[total_view]" value="{value type='input' id='total_view' default='1000'}" size="15" id="total_view" /> 
							<span id="js_ad_cost" style="font-weight:bold;"></span>
							<span id="js_ad_cost_recalculate" style="display:none;">
								<a href="#" onclick="$Core.Ad.recalculate();return false;">
									{phrase var='ad.recalculate_costs'}
								</a>
							</span>
							<div class="extra_info" id="js_ad_info_cost">
							
							</div>
						</div>
						<div class="clear"></div>
					</div>		
						
					<div class="table">
						<div class="table_left">
							{phrase var='ad.start_date'}:
						</div>
						<div class="table_right">
							{select_date prefix='start_' start_year='current_year' end_year='+10' field_separator=' / ' field_order='MDY' default_all=true add_time=true time_separator='core.time_separator'}
							<div class="extra_info">
								{phrase var='ad.note_the_time_is_set_to_your_registered_time_zone'}
							</div>
						</div>
						<div class="clear"></div>
					</div>		
					
					<div class="table_clear">
						<input type="submit" value="{phrase var='ad.submit'}" class="button" id="js_submit_button" />
					</div>
				</div>
				
			</form>
		{/if}
	{/if}
{/if}
