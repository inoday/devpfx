
var current_active_obj;
Core.admincp_blocks = {
	update_name: function() {
		var new_value = $('.input_holder input').val();
		current_active_obj.html(new_value);
		$('#edit_block_name').fadeOut();
		$Core.ajax('admincp.updateBlockName', {
			type: 'POST',
			params: {
				name: new_value,
				block_id: $('.tmp_block_id').val()
			}
		});
	},

	get_form: function(this_obj) {

		$('#add_new_block').remove();
		$('body').prepend('<div id="add_new_block"></div>');

		$('#add_new_block').height($(window).height());
		var html = '<div id="aceeditor" data-mode="html">' + this_obj.html() + '</div>' +
				'<div id="add_new_block_input"><input type="text" name="title" placeholder="Block Title" /></div>' +
				'<div id="add_new_block_submit"><input type="button" value="Save" class="button" /></div>';

		$('#add_new_block').html(html);

		Core.action.ace_editor();

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				$('#add_new_block').fadeOut('fast', function() {
					$('#add_new_block').remove();
				});
			}
		});

		$('#add_new_block_submit').click(function() {

			if (ace_editor.getValue() == '') {

				alert('Add some content for your block.');

				return false;
			}

			if ($('#add_new_block_input input').val() == '') {

				alert('Enter a title for your block');

				return false;
			}

			$Core.ajax('admincp.manageBlock', {
				params: {
					html: ace_editor.getValue(),
					location: this_obj.data('location'),
					controller: this_obj.data('controller'),
					title: $('#add_new_block_input input').val(),
					edit_id: (this_obj.data('edit-id') ? this_obj.data('edit-id') : 0)
				},
				type: 'POST',
				success: function(block_id) {
					if (this_obj.data('edit-id')) {
						$('[data-block-id="' + this_obj.data('edit-id') + '"]').html($('#add_new_block_input input').val());
					} else {
						$('.js_block_group_' + this_obj.data('location') + ' .js_sortable .js_sortable_title').after('<div data-block-type="2" data-block-id="' + block_id + '" class="block js_sortable_header">' + $('#add_new_block_input input').val() + '</div>');
					}
					$('#add_new_block').fadeOut('fast', function() {
						$('#add_new_block').remove();
					});
				}
			});
		});

		return false;
	}
};

Core.action.blocks = function() {

	$('.add_new_block').click(function() {
		Core.admincp_blocks.get_form($(this));

		return false;
	});

	$('#block_listing ul li a').click(function() {

		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$(this).parent().find('.js_sortable').hide();

			return false;
		}

		$(this).addClass('active');
		$(this).parent().find('.js_sortable').show();

		return false;
	});

	$(document).bind('contextmenu', function(e) {
		return false;
	});

	$('.js_sortable').sortable('destroy');
	$('.js_sortable').sortable({
		cursor: 'move',
		helper: 'clone',
		appendTo: 'body',
		zIndex: 10000000,
		connectWith: '.dnd_block_info',
		stop: function(element, ui) {
			var ordering = 0,
				ids = '';

			if ($(ui.item).hasClass('do_not_add')) {
				$(ui.item).removeClass('do_not_add').data('block-id', 'NEW_BLOCK_' + $(ui.item).data('name'));
			}

			$('.block:not(.do_not_add)').each(function() {
				ordering++;

				ids += '&blocks[]=' + $(this).parents('.js_sortable:first').data('location') + ':' + $(this).data('block-id') + ':' + ordering;
			});

			$Core.ajax('admincp.processOrdering', {
				params: ids,
				type: 'POST',
				success: function(data) {
					if (parseInt(data) > 0) {
						$(ui.item).data('block-id', data);
						Core.action.blocks_click();
					}
				}
			})
		}
	});
};

Core.action.blocks_click = function() {
	$('.block:not(.do_not_add)').dblclick(function() {
		current_active_obj = $(this);

		if ($(this).data('block-type') == '2') {

			$Core.ajax('admincp.getBlockContent', {
				params: {
					id: current_active_obj.data('block-id')
				},
				success: function(data) {
					data = $.parseJSON(data);

					$('.tmp_anchor_obj').remove();
					$('body').prepend('<div class="tmp_anchor_obj" style="display:none" data-edit-id="' + current_active_obj.data('block-id') + '" data-location="' + data.location + '" data-controller="' + data.m_connection + '">' + data.source_code + '</div>');

					Core.admincp_blocks.get_form($('.tmp_anchor_obj'));

					$('#add_new_block_input input').val(data.title);
				}
			})

			return;
		}

		$('body').prepend('<div id="edit_block_name"><form method="post" action="#" onsubmit="Core.admincp_blocks.update_name(); return false;"><div><input class="tmp_block_id" type="hidden" name="block_id" value="' + $(this).data('block-id') + '" /></div><div class="input_holder"><input type="text" name="block_name" value="' + $(this).html() + '" onfocus="this.select();" onblur="Core.admincp_blocks.update_name();" autocomplete="off" /></div></form></div>');
		$('.input_holder input').focus();
	});

	$('.block:not(.do_not_add)').mousedown(function(e) {
		if (e.which === 3) {
			$('#drop_menu_actions').remove();
			$(this).append('<div id="drop_menu_actions"></div>');
			$('#drop_menu_actions').html('<ul><li><a href="#" onclick="$.ajaxCall(\'admincp.deleteBlock\', \'&block_id=' + $(this).data('block-id') + '\'); $(\'#drop_menu_actions\').fadeOut(); $(this).parents(\'.block:first\').remove(); return false;">Delete Block</a></li></ul>');

			/*
			$('#drop_menu_actions').css({
				top: (offset.top + $(this).innerHeight() + 10) + 'px',
				left: offset.left
			});
			*/

			$('body').not('.block').click(function() {
				$('#drop_menu_actions').fadeOut();
			});
		}
	});
};