<upgrade>
	<phpfox_update_settings>
		<setting>
			<group />
			<module_id>friend</module_id>
			<is_hidden>0</is_hidden>
			<type>large_string</type>
			<var_name>friend_meta_keywords</var_name>
			<phrase_var_name>setting_friend_meta_keywords</phrase_var_name>
			<ordering>7</ordering>
			<version_id>2.0.0rc1</version_id>
			<value>friends, buddies</value>
		</setting>
		<setting>
			<group>cache</group>
			<module_id>friend</module_id>
			<is_hidden>1</is_hidden>
			<type>boolean</type>
			<var_name>load_friends_online_ajax</var_name>
			<phrase_var_name>setting_load_friends_online_ajax</phrase_var_name>
			<ordering>6</ordering>
			<version_id>3.6.0rc1</version_id>
			<value>1</value>
		</setting>
	</phpfox_update_settings>
	<phpfox_update_menus>
		<menu>
			<module_id>friend</module_id>
			<parent_var_name />
			<m_connection>profile</m_connection>
			<var_name>menu_friend_friends</var_name>
			<ordering>21</ordering>
			<url_value>profile.friend</url_value>
			<version_id>2.0.0alpha1</version_id>
			<disallow_access />
			<module>friend</module>
			<value />
		</menu>
	</phpfox_update_menus>
	<phpfox_update_blocks>
		<block>
			<type_id>0</type_id>
			<m_connection>core.index-member</m_connection>
			<module_id>friend</module_id>
			<component>birthday</component>
			<location>3</location>
			<is_active>1</is_active>
			<ordering>4</ordering>
			<disallow_access />
			<can_move>1</can_move>
			<title>Upcoming Events</title>
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>profile.index</m_connection>
			<module_id>friend</module_id>
			<component>mutual-friend</component>
			<location>3</location>
			<is_active>1</is_active>
			<ordering>6</ordering>
			<disallow_access />
			<can_move>1</can_move>
			<title><![CDATA[{phrase var=&#039;friend.mutual_friends&#039;}]]></title>
			<source_code />
			<source_parsed />
		</block>
		<block>
			<type_id>0</type_id>
			<m_connection>core.index-member</m_connection>
			<module_id>friend</module_id>
			<component>suggestion</component>
			<location>3</location>
			<is_active>1</is_active>
			<ordering>5</ordering>
			<disallow_access />
			<can_move>1</can_move>
			<title><![CDATA[{phrase var=&#039;friend.suggestions&#039;}]]></title>
			<source_code />
			<source_parsed />
		</block>
	</phpfox_update_blocks>
</upgrade>