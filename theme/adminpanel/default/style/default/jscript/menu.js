
Core.admincp = {
	show_frame: function(url, blocks) {
		if ($('#frame_holder').length) {
			$('#frame_holder iframe').attr('src', url);
		} else {
			$('body').prepend('<div id="frame_holder_cover"></div><div id="frame_holder"><iframe src="' + url + '"></iframe></div>');
			$('#frame_holder, #frame_holder_cover').height($(window).height()).width($(window).width() - 450);
			$('#frame_holder iframe').height($('#frame_holder').height() - 20).width('1400px');
			$('#site_content').hide();
			$('#js_content_container').css('min-height', '0');
		}
	}
};

Core.action.admincp_menu = function() {
	var window_height = $(window).height();

	$('.theme_drop_li .icon').click(function() {
		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			$('#admincp_theme_manage ul li.hide').hide();
			$('#admincp_theme_manage ul li.hide a').hide();

			return false;
		}

		$(this).addClass('active');
		$('#admincp_theme_manage ul li.hide').css('display', 'inline-block');
		$('#admincp_theme_manage ul li.hide a').show();

		return false;
	});

	if ($('.sortable').length && $('.sortable').parent().hasClass('table')) {
		var this_parent = $('.sortable').parent(),
			this_form = $('.sortable').parents('form:first');

		this_form.find('.table_clear').remove();
		this_parent.removeClass('table');

				var new_sortable = ''
		$('.sortable li').each(function() {
			var this_html = $(this)
			this_html.find('img').remove();

			var this_actions = '';
			$('#js_menu_drop_down .dropContent li').each(function() {

				var add_delete = false;
				if ($(this).html().match(/delete/i)) {
					add_delete = true;
				}

				this_actions += $(this).html().replace('href="#"', 'href="' + this_html.find('a').attr('href') + '"' + (add_delete ? ' class="is_delete"' : ''));
			});

			new_sortable += '<tr><td class="name">' + this_html.html() + '</td>' +
				'<td class="action_list">' + this_actions + '</td>' +
				'</tr>';
		});
		$('.sortable').remove();

		this_parent.prepend('<table class="is_sortable new_sortable" data-ajax="' + this_form.attr('action') + '">' + new_sortable + '</table>');
	}

	$('.menu_manager a').click(function() {
		$('.menu_manager li.active').removeClass('active');
		$(this).parent().addClass('active');
		$('.menu_form').hide();
		$('#breadcrumb_content_holder').find('[data-type="' + $(this).data('type') + '"]').show();

		return false;
	});

	if ($('#admincp_search_panel').length) {
		$('#admincp_search_panel').height(window_height - 50);
	}

	if (!$('#page_theme_admincp_manage').length) {
		$('#js_content_container').css('min-height', window_height + 20);
	}

	if ($('.table_header').length && !$('#form_panel').length) {
		var total_headers = 0;
		$('.table_header').each(function() {
			if ($(this).parents('#admincp_search_panel').length) {
				return;
			}
			total_headers++;

			if (total_headers != 1) {
				$(this).css('padding-top', '30px');
			}
		});
	}

	if ($('.table_clear').length) {
		$('.table_clear .button').not(':first').addClass('button_off');
	}

	if ($('#breadcrumb_holder').length) {
		$('#breadcrumb_holder').height(window_height - 50);
	}

	if ($('#content_editor_menu').length) {
		$('#content_editor_menu').height(window_height - 50);
	}

	$('.main_menu_link:not(.built)').each(function() {
		$(this).addClass('built');
		$(this).html('<span class="icon"></span><span class="phrase">' + $(this).html() + '</span>');
	});

	$('#top').height(window_height + ($('#page_theme_admincp_manage').length ? 40 : 0)).show();
	$('.main_menu').css({
		height: $('#top').height() - 60
	});

	$('#js_content_container').show();

	if ($('#top').width() == '40') {
		$('#top').mouseenter(function() {
			$('#top').animate({
				width: '250px'
			}, 'fast', function() {
				$('#top span.phrase, #top .info span').show();

				$(document).click(function() {
					$('#top span.phrase, #top .info span').hide();
					$('#top').animate({
						width: '40px'
					}, 'fast');
				});
			});
		});
	}

	$('.main_menu_link').click(function() {

		if ($('#frame_holder').length) {
			$('#site_content').show();
			$('#frame_holder').fadeOut('fast', function() {
				$('#frame_holder, #frame_holder_cover').remove();
			});
		}

		if (!$(this).parent().find('.main_sub_menu').length && !$(this).hasClass('do_ajax')) {
			return true;
		}

		if ($(this).hasClass('active')) {
			$('.main_sub_menu').hide();
			$(this).removeClass('active');

			return false;
		}

		if ($(this).hasClass('do_ajax')) {
			$(this).parent().append('<div class="main_sub_menu"></div>');
			var content_obj = $(this).parent().find('.main_sub_menu');
			$.ajax({
				url: $(this).attr('href'),
				data: 'is_ajax_pager=1',
				complete: function(e) {
					content_obj.html(e.responseText);
				}
			});
		}

		$('.main_menu_link.active').removeClass('active');
		$(this).addClass('active');
		$('.main_sub_menu').hide();
		$(this).parent().find('.main_sub_menu').height(window_height).show();


		return false;
	});

	if ($('.theme_images').length) {

		$('.theme_images').width($(window).width() - 200);
		Core.build_upload('.theme_images');

		$('.theme_images li').dblclick(function(e) {
			e.preventDefault();
			window.open($(this).data('url'));
		});

		$('.theme_images li').draggable({
			refreshPositions: true,
			opacity: 0.6
		});

		$('.theme_images').height(window_height);
		$('#droppable').height(window_height).droppable({
			out: function() {
				$(this).removeClass('start');
			},
			over: function() {
				$(this).addClass('start');
			},
			drop: function(event, ui) {
				$.ajax({
					url: $(this).data('url'),
					type: 'POST',
					data: 'image=' + $(ui.draggable).html()
				})
				$(ui.draggable).remove();
				$(this).removeClass('start');
			}
		});

		$('#drop_holder_themes').show();
	}

	if ($('#form_panel').length) {
		$('#form_panel').height(window_height - $('.form_panel_holder .table_clear').innerHeight() - 50 - 20);
	}

	$('.form_panel_holder').submit(function() {
		var id = $(this).find('#aceeditor').data('id');
		$(this).prepend('<textarea name="val[' + id + ']" style="display:none;">' + ace_editor.getValue() + '</textarea>');

		return true;
	});

	if ($('#pins').length) {
		$('#pins').width($(window).width() - 270);

		$.getScript('http://masonry.desandro.com/masonry.pkgd.min.js', function() {

			var msnry = new Masonry( '#pins', {
				isInitLayout: false,
				itemSelector: '.block'
			});

			$('#pins').show();
			msnry.layout();
		});
	}

	if ($('.is_sortable').length) {
		$('.is_sortable tbody').sortable({
			helper: function(e, ui) {
				ui.children().each(function() {
					$(this).width($(this).width());
				});
				return ui;
			},
			stop: function(e, ui) {
				// p($(this).find('.is_sortable_icon').data('sort-id'));

				var url = $(this).parent().data('ajax');
				if (url.substr(0, 7) == 'http://') {
					var cnt = 0;
					$('.is_sortable input[type="hidden"]').each(function() {
						cnt++;

						$(this).val(cnt);
					});

					$.ajax({
						url: url,
						type: 'POST',
						dataType: 'HTML',
						data: $(this).parents('form:first').getForm() + '&is_ajax=1&skip_page_redirect=1',
						complete: function() {

						}
					})
				} else {
					var ids = '';
					$('.is_sortable_icon').each(function() {
						ids += $(this).data('sort-id') + ',';
					});

					$.ajaxCall(url, 'ordering=' + ids);
				}
			},
			axis: 'y'
		});
	}

	if ($('.setting_title').length) {
		var cnt = 0;
		$('.setting_title').each(function() {
			cnt++;
			// p($(this).height());
			$('.st_row_' + $(this).data('row')).css('height', $(this).height());
		});
	}

	$('.n_dashboard').addClass('is_active');
	var current_url = window.location,
		url_params = $Core.getParams($Core.getRequests(window.location.href, true));
	$('.main_menu_link').each(function() {
		var sub_parts = $Core.getParams($Core.getRequests($(this).attr('href'), true));

		if (isset(sub_parts['req2']) && isset(url_params['req2']) && sub_parts['req2'] == url_params['req2']) {
			$('.main_menu_link.is_active').removeClass('is_active');
			$(this).addClass('is_active');
		}
	});

	if ($('.themes').length) {
		$('.themes').each(function() {
			$(this).css('background-image', 'url(' + $(this).data('src') + ' )');
		});
	}
};