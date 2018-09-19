const $ = window.jQuery;

var isMobile = false;
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
	isMobile = true;
}
var qsRegex;
var galleries = [
	{
		elem: $('#images'),
		selector: '.isotope-gallery-item'
	}
];

var AJAX_URL = $('meta[name="ajaxurl"]').attr('content');
// $(document).ready(function(){

/*******************************************************
	EVENT LISTENERS
	*******************************************************/
$(window).resize(function() {
	resizeFooterContact();
	resizeHomeAvailabityWidget();
});

// launch video in modal window
$('.launch-video').click(function(e) {
	e.preventDefault();
	var data = $(this).attr('data-video');
	$('#videoModal')
		.find('.modal-content .flex-video')
		.append(data);
	$('#videoModal').modal('show');
});
// empty the modal content when the modal window is closed
$('#videoModal').on('hide.bs.modal', function(e) {
	$('#videoModal')
		.find('.modal-content .flex-video')
		.empty();
});
// scroll to top
$("a[href='#top']").click(function() {
	$('html, body').animate(
		{
			scrollTop: 0
		},
		{
			duration: 3000,
			easing: 'easeOutExpo'
		}
	);
	return false;
});

var gallerySearchCategories = '';
function searchGalleries(search, process) {
	return $.ajax({
		url: AJAX_URL,
		data: {
			search: search,
			categories: gallerySearchCategories,
			action: 'search_galleries'
		},
		success: function(data) {
			data = JSON.parse(data);
			process(data);
		}
	});
}

$('.filter-search input').on('keyup', function(e) {
	var val = $(this).val();
	var $elem = $(this);
	val = val.replace('.filter-', '');
	var id = $(this)
		.parent()
		.attr('id');
	gallerySearchCategories = $('[data-filter="#' + id + '"]').data('categories');

	$elem.typeahead({
		source: searchGalleries,
		autoSelect: true,
		afterSelect: function(elem) {
			var url = '';
			var val = getParameterByName('search');
			if (val !== null) {
				url = window.location.href.replace('search=' + val, 'search=' + elem.name);
			} else {
				url = window.location.href + '?search=' + elem.name;
			}
			window.location = url;
		}
	});
});

function getParameterByName(name, url) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, '\\$&');
	var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

/*******************************************************
	SITE INITIALIZATION
	*******************************************************/
function initializeSite() {
	resizeFooterContact();
	resizeHomeAvailabityWidget();
	$('.lightbox:not(.custom-lightbox)').remove();

	var carouselInterval = $('body').attr('data-carousel-interval') > 0 ? $('body').attr('data-carousel-interval') : false;
	$('.carousel').carousel({
		interval: carouselInterval
	});

	// filters('#images','image');
	// filters('#images','isotope-gallery-item');

	galleries.forEach(function(gallery) {
		initializeGallery(gallery.elem, gallery.selector);
		// TURNED OFF ACTIVE FILTERING WHEN TYPING
		// initializeFilters(gallery.elem);
	});
}

function initializeGallery($elem, selector) {
	$elem.imagesLoaded(function() {
		$elem.fadeIn().isotope({
			itemSelector: selector,
			isFitWidth: true,
			percentPosition: true,
			layoutMode: 'fitRows',
			stagger: 10,
			transitionDuration: 0,
			filter: function() {
				return qsRegex
					? $(this)
							.attr('class')
							.match(qsRegex)
					: true;
			}
		});
	});
}

function initializeFilters($elem) {
	var filterSelector = $elem.data('filter');
	var $filter = $(filterSelector);

	var $input = $filter.find('input[type="text"]').first();
	$input.keyup(function() {
		var text = $(this).val();
		var filterText;
		if (text) {
			filterText = '.filter-' + text.replace(' ', '-');
			qsRegex = new RegExp(filterText, 'gi');
		} else {
			filterText = '*';
			qsRegex = null;
		}

		$elem.isotope();
	});
	// keyup(dd(function(){
	// 	var text = $(this).val();
	// 	var filterText;
	// 	if(text){
	// 		filterText = '.filter-' + text
	// 	} else{
	// 		filterText = '*';
	// 	}
	// 	console.log(filterText);
	// 	qsRegex = new RegExp( filterText, 'gi' );
	// 	$elem.isotope();
	// }));
	// $(document).on('click','.filter-selected',function($evt){
	// 	console.log('here');
	// 	$evt.preventDefault();
	// 	$(this).fadeOut().remove();
	//
	// });
	// $filters.find('.dropdown-menu li a').click(function($evt){
	//
	// 	$evt.preventDefault();
	// 	$filters.find('.filter-selected').fadeOut().remove();
	// 	var $html = $('<span class="filter-selected"><a href="#"><span class="text">'+$(this).text()+'</span><span class="glyphicon glyphicon-remove"></span></a></span>');
	// 	$filters.find('.filter-header').append($html);
	// 	var cat = $(this).attr('data-option-value');
	// 	$elem.isotope({
	// 		filter:cat
	// 	});
	// });
}

function dd(fn, threshold) {
	var timeout;
	return function debounced() {
		if (timeout) {
			clearTimeout(timeout);
		}
		function delayed() {
			fn();
			timeout = null;
		}
		setTimeout(delayed, threshold || 100);
	};
}

/*******************************************************
	SELECT PICKER
	*******************************************************/
$('.selectpicker').selectpicker({
	dropupAuto: false,
	mobile: isMobile
});
$('.selectpicker').addClass('visible');
$('.selectpicker')
	.parents('.availability-widget')
	.addClass('visible');
$('.availability-form .selectpicker').each(function() {
	var val = $(this).attr('data-selected');
	var selector = 'value=' + val;
	$(this)
		.find('option[value="' + val + '"]')
		.attr('selected', true);
	$(this).selectpicker('refresh');
});

// center the home availability widget next to the review widget
function resizeHomeAvailabityWidget() {
	$('.review-widget').each(function() {
		var height = $(this).height();
		$(this)
			.parent()
			.find('.availability-widget-wrapper')
			.height(height);
	});
}

//parallax scrolling
// $.stellar({
//     horizontalScrolling: false,
//     responsive: true
// });

// footer center contact
function resizeFooterContact() {
	var footerHeight = $('#page-footer .news').height();
	$('#page-footer .contact').css('height', footerHeight);
}

// function filters(containerId,type,callback,elementType){
// 	var $filterContainer = $('.filters');
// 	var $filterDropdown  = $filterContainer.find('.dropdown');
//
// 	if($filterContainer.length > 0){
// 		$filterContainer.find('.dropdown-toggle').dropdown();
//
// 		$filterDropdown.on('show.bs.dropdown', function(e){
// 			$(this).find('.dropdown-menu').first().slideDown();
// 		});
//
// 		$filterDropdown.on('hide.bs.dropdown', function(e){
// 			$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
// 		});
//
// 		$filterDropdown.find('select').click(function(e){
// 			e.preventDefault();
// 			e.stopPropagation();
// 		});
// 	}
// 	else{
// 		$filterContainer = $(containerId);
// 	}
//
// 	// $filterContainer.aposhFilter({
// 	// 	contentWrapper : containerId,
// 	// 	type : type,
// 	// 	done: callback,
// 	// 	elementType:elementType
// 	// });
// }

initializeSite();
// });
