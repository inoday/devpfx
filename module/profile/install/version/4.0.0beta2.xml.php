<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>profile</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>profile_seo_for_meta_title</var_name>
			<phrase_var_name>setting_profile_seo_for_meta_title</phrase_var_name>
			<ordering>5</ordering>
			<version_id>2.0.0rc4</version_id>
			<value>{full_name} - {gender_name} - {location}</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>profile</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>cache_blocks_design</var_name>
			<phrase_var_name>setting_cache_blocks_design</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>1</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>profile</module_id>
			<parent_var_name />
			<m_connection>profile</m_connection>
			<var_name>menu_profile</var_name>
			<ordering>19</ordering>
			<url_value>profile</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>profile</module>
			<value />
		</menu>
		<menu>
			<module_id>profile</module_id>
			<parent_var_name />
			<m_connection>profile.my</m_connection>
			<var_name>menu_customize_profile</var_name>
			<ordering>30</ordering>
			<url_value>profile.designer</url_value>
			<version_id>2.0.0alpha3</version_id>
			<disallow_access />
			<module>profile</module>
			<value />
		</menu>
		<menu>
			<module_id>profile</module_id>
			<parent_var_name />
			<m_connection>profile.my</m_connection>
			<var_name>menu_my_profile</var_name>
			<ordering>27</ordering>
			<url_value>profile</url_value>
			<version_id>2.0.0alpha3</version_id>
			<disallow_access />
			<module>profile</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>