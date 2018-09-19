const $ = window.jQuery;

$('[data-category]').click(function(e) {
	e.preventDefault();
	var category = $(this).attr('data-category');
	var selector = $(this).attr('data-gallery');
	if (category == 'reset') {
		$(selector)
			.find('.gallery-item')
			.removeClass('hide-me');
		$(selector)
			.find('.gallery-item')
			.show();
	} else {
		var elems = $(selector).find('.gallery-item:not(.' + category + ')');
		elems.hide();
		// elems.addClass('hide-me');
		// setTimeout(function(){
		//   elems.each(function(){
		//     $(this).hide();
		//   });
		// },200);

		var nonElems = $(selector).find('.gallery-item.' + category);
		// nonElems.removeClass('hide-me');
		nonElems.show();
	}

	// $(selector).find('.gallery-item').show();
});
