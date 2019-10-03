	// // Home Form Ajax
	$(document.body).on('click', '#js-submit', function(e) {
		 //e.preventDefault();
		
		$.ajax({
            type: 'POST',
            url: public_localizer.ajax_url,
            data: {
				action: 'my_user_ajax',
                fields: $('form#custom-form').serialize()
            },
            success: function(res) {
                // $('#result').html(res);
            }           
        });
	})
