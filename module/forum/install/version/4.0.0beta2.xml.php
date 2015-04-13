<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>forum</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>forum_time_stamp</var_name>
			<phrase_var_name>setting_forum_time_stamp</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0alpha1</version_id>
			<value>M j, g:i a</value>
		</setting>
		<setting>
			<group />
			<module_id>forum</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>forum_user_time_stamp</var_name>
			<phrase_var_name>setting_forum_user_time_stamp</phrase_var_name>
			<ordering>2</ordering>
			<version_id>2.0.0alpha1</version_id>
			<value>F j, Y</value>
		</setting>
		<setting>
			<group />
			<module_id>forum</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>global_forum_timezone</var_name>
			<phrase_var_name>setting_global_forum_timezone</phrase_var_name>
			<ordering>3</ordering>
			<version_id>2.0.5</version_id>
			<value>g:i a</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>forum</module_id>
			<parent_var_name />
			<m_connection>main</m_connection>
			<var_name>menu_forum</var_name>
			<ordering>6</ordering>
			<url_value>forum</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>forum</module>
			<value />
		</menu>
	</phpfox_update_menus>
	<blocks>
		<block>
			<type_id>0</type_id>
			<m_connection>core.index-member</m_connection>
			<module_id>forum</module_id>
			<component>timezone</component>
			<location>0</location>
			<is_active>1</is_active>
			<ordering>3</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title />
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>core.index</m_connection>
			<module_id>forum</module_id>
			<component>timezone</component>
			<location>0</location>
			<is_active>1</is_active>
			<ordering>1</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title />
			<source_code />
			<source_parsed />
		</block>
	</blocks>
</upgrade>