<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>blog</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>blog_time_stamp</var_name>
			<phrase_var_name>setting_blog_time_stamp</phrase_var_name>
			<ordering>2</ordering>
			<version_id>2.0.0alpha1</version_id>
			<value>F j, Y</value>
		</setting>
		<setting>
			<group />
			<module_id>blog</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>blog_meta_description</var_name>
			<phrase_var_name>setting_blog_meta_description</phrase_var_name>
			<ordering>6</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>Read up on the latest blogs on Site Name.</value>
		</setting>
		<setting>
			<group />
			<module_id>blog</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>blog_meta_keywords</var_name>
			<phrase_var_name>setting_blog_meta_keywords</phrase_var_name>
			<ordering>13</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>blog, blogs, journals</value>
		</setting>
		<setting>
			<group>spam</group>
			<module_id>blog</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>spam_check_blogs</var_name>
			<phrase_var_name>setting_spam_check_blogs</phrase_var_name>
			<ordering>5</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>0</value>
		</setting>
	</phpfox_update_settings>
	<phrases>
		<phrase>
			<module_id>blog</module_id>
			<version_id>4.0.0beta1</version_id>
			<var_name>admin_menu_categories</var_name>
			<added>1408472813</added>
			<value>Categories</value>
		</phrase>
	</phrases>
	<phpfox_update_menus>
		<menu>
			<module_id>blog</module_id>
			<parent_var_name />
			<m_connection>profile</m_connection>
			<var_name>menu_blogs</var_name>
			<ordering>20</ordering>
			<url_value>profile.blog</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>blog</module>
			<value />
		</menu>
		<menu>
			<module_id>blog</module_id>
			<parent_var_name />
			<m_connection>blog.index</m_connection>
			<var_name>menu_add_new_blog</var_name>
			<ordering>32</ordering>
			<url_value>blog.add</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>blog</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>