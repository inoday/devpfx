<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>mail</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>mail_time_stamp</var_name>
			<phrase_var_name>setting_mail_time_stamp</phrase_var_name>
			<ordering>9</ordering>
			<version_id>2.0.0alpha1</version_id>
			<value>M j, g:i a</value>
		</setting>
		<setting>
			<group />
			<module_id>mail</module_id>
			<is_hidden>0</is_hidden>
			<type>boolean</type>
			<var_name>enable_cron_delete_old_mail</var_name>
			<phrase_var_name>setting_enable_cron_delete_old_mail</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0beta5</version_id>
			<value>1</value>
		</setting>
		<setting>
			<group />
			<module_id>mail</module_id>
			<is_hidden>0</is_hidden>
			<type>integer</type>
			<var_name>cron_delete_messages_delay</var_name>
			<phrase_var_name>setting_cron_delete_messages_delay</phrase_var_name>
			<ordering>2</ordering>
			<version_id>2.0.0beta5</version_id>
			<value>30</value>
		</setting>
		<setting>
			<group>spam</group>
			<module_id>mail</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>spam_check_messages</var_name>
			<phrase_var_name>setting_spam_check_messages</phrase_var_name>
			<ordering>7</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group />
			<module_id>mail</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>threaded_mail_conversation</var_name>
			<phrase_var_name>setting_threaded_mail_conversation</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.2.0beta1</version_id>
			<value>1</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>mail</module_id>
			<parent_var_name />
			<m_connection>mail</m_connection>
			<var_name>menu_compose</var_name>
			<ordering>31</ordering>
			<url_value>mail.compose</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>mail</module>
			<value />
		</menu>
	</phpfox_update_menus>
</upgrade>