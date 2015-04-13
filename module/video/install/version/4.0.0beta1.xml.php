<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>video</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>video_time_stamp</var_name>
			<phrase_var_name>setting_video_time_stamp</phrase_var_name>
			<ordering>4</ordering>
			<version_id>2.0.0beta2</version_id>
			<value>F j, Y</value>
		</setting>
		<setting>
			<group />
			<module_id>video</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>video_meta_keywords</var_name>
			<phrase_var_name>setting_video_meta_keywords</phrase_var_name>
			<ordering>11</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>video, sharing, free, upload</value>
		</setting>
		<setting>
			<group />
			<module_id>video</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>video_meta_description</var_name>
			<phrase_var_name>setting_video_meta_description</phrase_var_name>
			<ordering>17</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>Share your videos with friends, family, and the world on Site Name.</value>
		</setting>
		<setting>
			<group />
			<module_id>video</module_id>
			<is_hidden>0</is_hidden>
			<type>boolean</type>
			<var_name>enabled_embedly_import</var_name>
			<phrase_var_name>setting_enabled_embedly_import</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.0.1</version_id>
			<value>1</value>
		</setting>
		<setting>
			<group />
			<module_id>video</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>embedly_api_key</var_name>
			<phrase_var_name>setting_embedly_api_key</phrase_var_name>
			<ordering>2</ordering>
			<version_id>3.0.1</version_id>
			<value />
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>video</module_id>
			<parent_var_name />
			<m_connection>main</m_connection>
			<var_name>menu_video</var_name>
			<ordering>8</ordering>
			<url_value>video</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>video</module>
			<value />
		</menu>
		<menu>
			<module_id>video</module_id>
			<parent_var_name />
			<m_connection>video.index</m_connection>
			<var_name>menu_upload_a_new_video</var_name>
			<ordering>46</ordering>
			<url_value>video.add</url_value>
			<version_id>2.0.0beta2</version_id>
			<disallow_access />
			<module>video</module>
			<value />
		</menu>
		<menu>
			<module_id>video</module_id>
			<parent_var_name />
			<m_connection>profile</m_connection>
			<var_name>menu_videos</var_name>
			<ordering>25</ordering>
			<url_value>profile.video</url_value>
			<version_id>2.0.0beta2</version_id>
			<disallow_access />
			<module>video</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>