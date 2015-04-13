
$Behavior.unity_admincp = function() {
	if ($('#unity_install_theme').length) {
		$.ajaxCall('theme.installTheme', '&token=' + $('#unity_install_theme').data('token'));
	}

	if ($('#unity_export').length) {
		Core.unity($('#unity_export').data('action'));
	}

	if ($('#admincp_login').length) {
		$('#admincp_login').show();
		var this_height = $('#admincp_login').height();
		$('#admincp_login').hide().css({
			'margin-top': '-' + (this_height / 2) + 'px'
		}).fadeIn();
	}
};