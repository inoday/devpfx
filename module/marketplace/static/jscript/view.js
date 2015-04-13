
$Behavior.marketplaceShowImage = function(){

	$('.js_listing_click').click(function() {

		if (!$('#marketplace_view_photo').length) {
			$('body').prepend('<div id="marketplace_view_photo"><div class="mvp_content"></div><div class="mvp_images"></div></div>');
			$('#marketplace_view_photo').height($(window).height());
			if ($('.marketplace_image_extra').length) {
				var cloned = $('.marketplace_image_extra').clone();
				cloned.appendTo('.mvp_images');
				$('.js_listing_click').each(function() {
					var image = new Image();
					image.src = $(this).data('href');
				});
				$Behavior.marketplaceShowImage();
			}
		}

		var image = new Image(),
			src = $(this).data('href');

		image.onload = function() {
			$('.mvp_content').html('<img src="' + src + '" />');
			$('.mvp_content').css({
				position: 'absolute',
				left: '50%',
				top: '50%',
				'margin-left': '-' + (image.width / 2) + 'px',
				'margin-top': '-' + (image.height / 2) + 'px'
			});
		};
		image.src = src;

		$('#marketplace_view_photo').click(function() {
			$('#marketplace_view_photo').fadeOut('fast', function() {
				$('#marketplace_view_photo').remove();
			});
		});

		$(document).keyup(function(e) {
			if (e.keyCode == 27) {
				$('#marketplace_view_photo').fadeOut('fast', function() {
					$('#marketplace_view_photo').remove();
				});
			}
		});

		return false;
	});
}