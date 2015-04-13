
var editor;
Core.action.theme_update_script = function() {

	editor = ace.edit("editor");
	editor.setTheme("ace/theme/xcode");
	editor.getSession().setMode("ace/mode/javascript");

	$('#editor').css({
		left: '40px'
	});

	$('#content_editor_submit ul').css('margin-left', '50px');

	$('#js_content_edit_area').show();

	$('#js_script_save').submit(function() {
		$('#js_template_content_text').val(editAreaLoader.getValue('editor'));
		$(this).ajaxCall('theme.saveJsFile', 'global_ajax_message=true');

		return false;
	});
};