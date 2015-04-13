<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>event</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>event_view_time_stamp_profile</var_name>
			<phrase_var_name>setting_event_view_time_stamp_profile</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0alpha4</version_id>
			<value>F j, Y</value>
		</setting>
		<setting>
			<group />
			<module_id>event</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>event_browse_time_stamp</var_name>
			<phrase_var_name>setting_event_browse_time_stamp</phrase_var_name>
			<ordering>2</ordering>
			<version_id>2.0.0alpha4</version_id>
			<value>l, F j</value>
		</setting>
		<setting>
			<group />
			<module_id>event</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>event_basic_information_time</var_name>
			<phrase_var_name>setting_event_basic_information_time</phrase_var_name>
			<ordering>3</ordering>
			<version_id>2.0.5</version_id>
			<value>l, F j, Y g:i a</value>
		</setting>
		<setting>
			<group />
			<module_id>event</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>event_basic_information_time_short</var_name>
			<phrase_var_name>setting_event_basic_information_time_short</phrase_var_name>
			<ordering>4</ordering>
			<version_id>2.0.5</version_id>
			<value>g:i a</value>
		</setting>
	</phpfox_update_settings>
	<phrases>
		<phrase>
			<module_id>event</module_id>
			<version_id>4.0.0beta1</version_id>
			<var_name>admin_menu_categories</var_name>
			<added>1408472916</added>
			<value>Categories</value>
		</phrase>
	</phrases>
	<phpfox_update_menus>
		<menu>
			<module_id>event</module_id>
			<parent_var_name />
			<m_connection>main</m_connection>
			<var_name>menu_event</var_name>
			<ordering>10</ordering>
			<url_value>event</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>event</module>
			<value />
		</menu>
		<menu>
			<module_id>event</module_id>
			<parent_var_name />
			<m_connection>event.index</m_connection>
			<var_name>menu_create_new_event</var_name>
			<ordering>43</ordering>
			<url_value>event.add</url_value>
			<version_id>2.0.0alpha4</version_id>
			<disallow_access />
			<module>event</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>