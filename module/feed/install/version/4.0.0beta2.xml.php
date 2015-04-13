<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>feed</module_id>
			<is_hidden>0</is_hidden>
			<type>string</type>
			<var_name>feed_display_time_stamp</var_name>
			<phrase_var_name>setting_feed_display_time_stamp</phrase_var_name>
			<ordering>1</ordering>
			<version_id>2.0.0alpha3</version_id>
			<value>F j, Y g:i a</value>
		</setting>
		<setting>
			<group />
			<module_id>feed</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>force_timeline</var_name>
			<phrase_var_name>setting_force_timeline</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.3.0beta1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group />
			<module_id>feed</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>can_add_past_dates</var_name>
			<phrase_var_name>setting_can_add_past_dates</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.3.0beta1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group />
			<module_id>feed</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>timeline_optional</var_name>
			<phrase_var_name>setting_timeline_optional</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.3.0beta1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group />
			<module_id>feed</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>add_feed_for_comments</var_name>
			<phrase_var_name>setting_add_feed_for_comments</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.4.0beta1</version_id>
			<value>0</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>feed</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>force_ajax_on_load</var_name>
			<phrase_var_name>setting_force_ajax_on_load</phrase_var_name>
			<ordering>1</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>1</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_blocks>
		<block>
			<type_id>0</type_id>
			<m_connection>core.index-member</m_connection>
			<module_id>feed</module_id>
			<component>display</component>
			<location>2</location>
			<is_active>1</is_active>
			<ordering>3</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title>Activity Feed</title>
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>profile.index</m_connection>
			<module_id>feed</module_id>
			<component>display</component>
			<location>2</location>
			<is_active>1</is_active>
			<ordering>9</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title />
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>profile.index</m_connection>
			<module_id>feed</module_id>
			<component>time</component>
			<location>3</location>
			<is_active>1</is_active>
			<ordering>5</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title>Feed Timeline</title>
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>pages.view</m_connection>
			<module_id>feed</module_id>
			<component>time</component>
			<location>3</location>
			<is_active>0</is_active>
			<ordering>4</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title>Feed Timeline</title>
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>pages.view</m_connection>
			<module_id>feed</module_id>
			<component>display</component>
			<location>2</location>
			<is_active>1</is_active>
			<ordering>10</ordering>
			<disallow_access />
			<can_move>0</can_move>
			<title>Feed display</title>
			<source_code />
			<source_parsed />
		</block>
	</phpfox_update_blocks>
	<sql><![CDATA[a:1:{s:9:"ADD_FIELD";a:1:{s:11:"phpfox_feed";a:3:{s:11:"total_boost";a:4:{i:0;s:7:"UINT:10";i:1;s:1:"0";i:2;s:0:"";i:3;s:2:"NO";}s:13:"total_comment";a:4:{i:0;s:7:"UINT:10";i:1;s:1:"0";i:2;s:0:"";i:3;s:2:"NO";}s:9:"feed_data";a:4:{i:0;s:4:"TEXT";i:1;N;i:2;s:0:"";i:3;s:3:"YES";}}}}]]></sql>
</upgrade>