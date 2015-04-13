<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>photo_image_details_time_stamp</var_name>
			<phrase_var_name>setting_photo_image_details_time_stamp</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0alpha1</version_id>
			<value>F j, Y</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>photo_meta_description</var_name>
			<phrase_var_name>setting_photo_meta_description</phrase_var_name>
			<ordering>8</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>Check out our photo gallery.</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>photo_meta_keywords</var_name>
			<phrase_var_name>setting_photo_meta_keywords</phrase_var_name>
			<ordering>14</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>photo, photos, albums, gallery</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>0</is_hidden>
			<type>integer</type>
			<var_name>how_many_categories_to_show_in_title</var_name>
			<phrase_var_name>setting_how_many_categories_to_show_in_title</phrase_var_name>
			<ordering>15</ordering>
			<version_id>2.0.4</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>1</is_hidden>
			<type>integer</type>
			<var_name>total_photo_input_bars</var_name>
			<phrase_var_name>setting_total_photo_input_bars</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0alpha1</version_id>
			<value>5</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>show_info_on_mouseover</var_name>
			<phrase_var_name>setting_show_info_on_mouseover</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.5.0beta1</version_id>
			<value>1</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>auto_crop_photo</var_name>
			<phrase_var_name>setting_auto_crop_photo</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.0.0beta1</version_id>
			<value>1</value>
		</setting>
		<setting>
			<group />
			<module_id>photo</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>html5_upload_photo</var_name>
			<phrase_var_name>setting_html5_upload_photo</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.7.0rc1</version_id>
			<value>1</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>photo</module_id>
			<parent_var_name />
			<m_connection>main</m_connection>
			<var_name>menu_photo</var_name>
			<ordering>5</ordering>
			<url_value>photo</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>photo</module>
			<value />
		</menu>
		<menu>
			<module_id>photo</module_id>
			<parent_var_name />
			<m_connection>profile</m_connection>
			<var_name>menu_photos</var_name>
			<ordering>22</ordering>
			<url_value>profile.photo</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>photo</module>
			<value />
		</menu>
		<menu>
			<module_id>photo</module_id>
			<parent_var_name />
			<m_connection>photo.index</m_connection>
			<var_name>menu_photo_upload_a_new_image_714586c73197300f65ba08f7dee8cb4a</var_name>
			<ordering>52</ordering>
			<url_value>photo.add</url_value>
			<version_id>3.3.0beta2</version_id>
			<disallow_access />
			<module>photo</module>
			<value />
		</menu>
		<menu>
			<module_id>photo</module_id>
			<parent_var_name />
			<m_connection>photo.albums</m_connection>
			<var_name>menu_photo_upload_a_new_image_0df7df42d810e7978c535292f273fc91</var_name>
			<ordering>53</ordering>
			<url_value>photo.add</url_value>
			<version_id>3.5.0beta1</version_id>
			<disallow_access />
			<module>photo</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>