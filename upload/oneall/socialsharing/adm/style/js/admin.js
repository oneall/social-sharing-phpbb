jQuery.noConflict();

(function($) {
	$(function() {
		$(document).ready(function($) {
			
			/* Open links in new window */
			$('a.external').attr('target', '_blank');

			/* Verify API Settings */
			$('#oa_social_sharing_test_api_settings').click(function() {
				var button = this;
				if ($(button).hasClass('working') === false) {
					$(button).addClass('working');
					var message_container;

					var subdomain = $('#oa_social_sharing_api_subdomain').val();
					
					var sid = $('#sid').html();

					var data = {
					  'api_subdomain' : subdomain,
					};

					var ajaxurl = 'index.php?sid=' + sid + '&i=-oneall-socialsharing-acp-socialsharing_acp_module&mode=settings&task=verify_subdomain';

					message_container = $('#oa_social_sharing_api_test_result');
					message_container.removeClass('success_message error_message').addClass('working_message');
					message_container.html('');

					$.post(ajaxurl, data, function(response_string) {
						
						var response_parts = response_string.split('|');
						var response_status = response_parts[0];
						var response_text = response_parts[1];

						message_container.removeClass('working_message');
						message_container.html(response_text);

						if (response_status == "success") {
							message_container.addClass('success_message');
						} else {
							message_container.addClass('error_message');
						}
						$(button).removeClass('working');
					});
				}
				return false;
			});
		});
	});
})(jQuery);