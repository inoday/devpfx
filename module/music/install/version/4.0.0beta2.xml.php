<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>music</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>music_release_date_time_stamp</var_name>
			<phrase_var_name>setting_music_release_date_time_stamp</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0beta1</version_id>
			<value>F j, Y</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>music</module_id>
			<parent_var_name />
			<m_connection>main</m_connection>
			<var_name>menu_music</var_name>
			<ordering>11</ordering>
			<url_value>music</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>music</module>
			<value />
		</menu>
		<menu>
			<module_id>music</module_id>
			<parent_var_name />
			<m_connection>music.index</m_connection>
			<var_name>menu_upload_a_song</var_name>
			<ordering>44</ordering>
			<url_value>music.upload</url_value>
			<version_id>2.0.0beta1</version_id>
			<disallow_access />
			<module>music</module>
			<value />
		</menu>
		<menu>
			<module_id>music</module_id>
			<parent_var_name />
			<m_connection>music.index</m_connection>
			<var_name>menu_create_an_album</var_name>
			<ordering>45</ordering>
			<url_value>music.album</url_value>
			<version_id>2.0.0beta1</version_id>
			<disallow_access />
			<module>music</module>
			<value />
		</menu>
	</phpfox_update_menus>
	<phpfox_update_blocks>
		<block>
			<type_id>0</type_id>
			<m_connection>music.album</m_connection>
			<module_id>music</module_id>
			<component>track</component>
			<location>3</location>
			<is_active>1</is_active>
			<ordering>177</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title>Manage Tracks for Albums</title>
			<source_code />
			<source_parsed />
		</block>
	</phpfox_update_blocks>
</upgrade>