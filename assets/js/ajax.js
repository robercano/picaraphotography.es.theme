/*global jQuery:false, root*/

var Ajax = {
	
	start: function() {
		
		Ajax.bind();
		
	},
	
	bind: function() {
		
		// ajax contact form
		jQuery(document).on('click', '.ajaxed input[type="submit"]', function(e) {
			e.preventDefault();
			
			var $form = jQuery(this).closest('.ajaxed');
			
			jQuery('.ajax-preloader', $form).show();
			
			jQuery.ajax({
				
				type: "POST",

				url: root.ajax,
				
				dataType: 'json',

				data: {
					'action': 'bw_ajax_form',
					'data': $form.serialize()
				},

				success: function(data) {
					
					jQuery('.ajax-preloader', $form).hide();
					
					if(data.success) {
						
						// success
						jQuery('input[type="text"], textarea', $form).val('');
						
						jQuery('.success', $form).slideDown(300);
						setTimeout(function() {
							jQuery('.success', $form).slideUp(300);
						}, 3000);
						
					}else{
						
						// error
						for (var i=0; i<data.errors.length; i++) {
							jQuery('*[name="' + data.errors[i] + '"]', $form).addClass('error');
						}
					}
				}
			});
		});
		
		jQuery(document).on('focus', 'input.error, textarea.error', function() {
			jQuery(this).removeClass('error');
		});
		// ajax contact form end
	}
	
};

Ajax.start();