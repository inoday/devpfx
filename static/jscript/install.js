
Core.action.install = function() {

	if ($('#unity_auth').length) {
		Core.unity('sites');
	}

	var cancel_themes = function() {

		$('#theme_select').animate({
			'margin-right': '-=60%'
		}, 'fast');
		$('body, #header').animate({
			'margin-left': '+=60%'
		}, 'fast');
	};

	$('.theme').each(function() {
		var image = new Image(),
			src = $(this).data('large-image');
			image.src = src;
	});

	$('.theme').click(function() {

		var this_obj = $(this);

		if ($(this).hasClass('active')) {
			$(this).removeClass('active');
			cancel_themes();
			return false;
		}

		$(this).addClass('active');
		$('body').prepend('<div id="theme_select"></div>');

		var html = '<div id="theme_links">' +
			'<a href="' + $(this).attr('href') + '">Use Theme</a>' +
			'<a href="#" class="cancel">Cancel</a>' +
			'</div>';
		$('#theme_select').html(html);

		$('#theme_select').css('background-image', 'url(' + $(this).data('large-image') + ')');
		$('#theme_select').height($(window).height()).show().css('margin-right', '-60%').show().animate({
			'margin-right': '+=60%'
		}, 'fast');

		$('body, #header').animate({
			'margin-left': '-60%'
		}, 'fast');

		$('.cancel').unbind().click(function() {
			this_obj.removeClass('active');
			cancel_themes()

			return false;
		});

		return false;
	});
};