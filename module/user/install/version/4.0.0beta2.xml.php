<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>user</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>user_dob_month_day_year</var_name>
			<phrase_var_name>setting_user_dob_month_day_year</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.0.0</version_id>
			<value>F j, Y</value>
		</setting>
		<setting>
			<group />
			<module_id>user</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>user_dob_month_day</var_name>
			<phrase_var_name>setting_user_dob_month_day</phrase_var_name>
			<ordering>2</ordering>
			<version_id>3.0.0</version_id>
			<value>F j</value>
		</setting>
		<setting>
			<group>registration</group>
			<module_id>user</module_id>
			<is_hidden>1</is_hidden>
			<type>array</type>
			<var_name>registration_steps</var_name>
			<phrase_var_name>setting_registration_steps</phrase_var_name>
			<ordering>2</ordering>
			<version_id>2.0.0alpha2</version_id>
			<value />
		</setting>
		<setting>
			<group>registration</group>
			<module_id>user</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>multi_step_registration_form</var_name>
			<phrase_var_name>setting_multi_step_registration_form</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0alpha2</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group />
			<module_id>user</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>split_full_name</var_name>
			<phrase_var_name>setting_split_full_name</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.4.0beta1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>user</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>cache_user_inner_joins</var_name>
			<phrase_var_name>setting_cache_user_inner_joins</phrase_var_name>
			<ordering>2</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>0</value>
		</setting>
	</phpfox_update_settings>
	<phrases>
		<phrase>
			<module_id>user</module_id>
			<version_id>4.0.0beta1</version_id>
			<var_name>admin_menu_search</var_name>
			<added>1408474285</added>
			<value>Search</value>
		</phrase>
	</phrases>
	<phpfox_update_menus>
		<menu>
			<module_id>user</module_id>
			<parent_var_name />
			<m_connection>user.privacy</m_connection>
			<var_name>menu_privacy_settings</var_name>
			<ordering>41</ordering>
			<url_value>user.privacy</url_value>
			<version_id>2.0.0alpha2</version_id>
			<disallow_access />
			<module>user</module>
			<value />
		</menu>
		<menu>
			<module_id>user</module_id>
			<parent_var_name />
			<m_connection>main</m_connection>
			<var_name>menu_browse</var_name>
			<ordering>2</ordering>
			<url_value>user.browse</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>user</module>
			<value />
		</menu>
		<menu>
			<module_id>user</module_id>
			<parent_var_name />
			<m_connection>user.privacy</m_connection>
			<var_name>menu_account_settings</var_name>
			<ordering>40</ordering>
			<url_value>user.setting</url_value>
			<version_id>2.0.0alpha2</version_id>
			<disallow_access />
			<module>user</module>
			<value />
		</menu>
		<menu>
			<module_id>user</module_id>
			<parent_var_name />
			<m_connection>profile.my</m_connection>
			<var_name>menu_edit_profile_picture</var_name>
			<ordering>29</ordering>
			<url_value>user.photo</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>user</module>
			<value />
		</menu>
		<menu>
			<module_id>user</module_id>
			<parent_var_name />
			<m_connection>profile.my</m_connection>
			<var_name>menu_edit_profile</var_name>
			<ordering>28</ordering>
			<url_value>user.profile</url_value>
			<version_id>2.0.0alpha3</version_id>
			<disallow_access />
			<module>user</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>