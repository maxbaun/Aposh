const $ = window.jQuery;

var ajaxurl = $('meta[name=ajaxurl]')
	.first()
	.attr('content');
// $.bridget('isotope', Isotope);
// here we go!
$.aposhFilter = function(element, options) {
	// plugin's default options
	// this is private property and is  accessible only from inside the plugin
	var defaults = {
		// if your plugin is event-driven, you may provide callback capabilities
		// for its events. execute these functions before or after events of your
		// plugin, so that users may customize those particular events without
		// changing the plugin's code
		onFoo: function() {},
		template: '<span class="filter-selected"><a href="#"><span class="text"></span><span class="glyphicon glyphicon-remove"></span></a></span>',
		filterKey: $(element).attr('data-option-key'),
		contentWrapper: '#images',
		type: 'image',
		pageNavSelector: '#page_nav',
		done: '',
		elementType: 'link'
	};

	// to avoid confusions, use "plugin" to reference the
	// current instance of the object
	var plugin = this;

	plugin.settings = {};

	var $element = $(element); // reference to the actual DOM element

	var $header = $(element)
		.find('.filter-header')
		.first();
	var $selector = $(element).find('.filter-selected');
	var $menu = $(element)
		.find('ul')
		.first();
	var $links = options.elementType === 'select' ? $menu.find('option') : $menu.find('a');

	var $maxPages = '';
	var $nextPage = '';
	var $init = true;
	// the "constructor" method that gets called when the object is created
	plugin.init = function() {
		plugin.settings = $.extend({}, defaults, options);

		$links.bind('click', itemClicked);

		$element.on('click', '.filter-selected', selectorClicked);
		$('#page_nav a').click(function(e) {
			e.preventDefault();
			$('#page_nav').fadeOut();
			loadMore();
		});
		var $termId = $(plugin.settings.contentWrapper).attr('data-term-id') ? $(plugin.settings.contentWrapper).attr('data-term-id') : '';
		getNexAndMaxPages($termId, function(result) {
			resetMasonry();
			if (typeof plugin.settings.done === 'function') {
				plugin.settings.done(plugin);
			}
		});
	};

	plugin.filterItems = function() {
		var options = [];
		options[plugin.settings.filterKey] = selectedItems().join('');
		// console.log(options);
		$(plugin.settings.contentWrapper).isotope(options);
	};

	var selectedItems = function() {
		var selected = [];
		$menu.find('[data-selected="true"]').each(function() {
			selected.push($(this).attr('data-option-value'));
		});
		return selected;
	};

	var selectorClicked = function(e) {
		var value = $(this).attr('data-option-value');
		$links.find('[data-option-value="' + value + '"]');
		$links.attr('data-selected', false);
		$(this).remove();
		$init = false;

		if (plugin.settings.elementType === 'select') {
			$element.find('select').val(0);
		}

		getNexAndMaxPages('', function(result) {
			resetMasonry();
		});
	};

	var getNexAndMaxPages = function(termId, callback) {
		$init = true;
		var termData = {
			termId: termId,
			type: plugin.settings.type,
			action: 'getTermLink'
		};
		$.ajax({
			url: ajaxurl,
			data: termData,
			method: 'POST'
		}).done(function(result) {
			var json = JSON.parse(result);
			$nextPage = typeof json.nextPage !== 'undefined' && json.nextPage !== '' ? json.nextPage : window.location.href.split('#')[0];
			$maxPages = json.maxPage;
			callback(json);
		});
	};

	var loadMore = function() {
		$(plugin.settings.contentWrapper).infinitescroll('resume');
		$(plugin.settings.contentWrapper).infinitescroll('retrieve');
	};

	var resetMasonry = function() {
		var isSettings = {
			navSelector: '#page_nav', // selector for the paged navigation
			nextSelector: '#page_nav a', // selector for the NEXT link (to page 2)
			itemSelector: '.' + plugin.settings.type, // selector for all items you'll retrieve
			path: [$nextPage + 'page/', ''],
			maxPage: $maxPages,
			extraScrollPx: 375,
			loading: {
				// selector: '#load-more',
				finishedMsg: 'No more images to load.',
				img: 'http://i.imgur.com/qkKy8.gif',
				msgText: 'Loading Images...'
			}
		};
		if ($(plugin.settings.contentWrapper).data('infinitescroll') && $(plugin.settings.contentWrapper).data('infinitescroll') !== 'undefined') {
			isSettings.state = {
				isDuringAjax: false,
				isInvalidPage: false,
				isDestroyed: false,
				isDone: false, // For when it goes all the way through the archive.
				isPaused: false,
				currPage: 0
			};
			$(plugin.settings.contentWrapper).infinitescroll('destroy');
			// $(plugin.settings.contentWrapper).data('infinitescroll',null);
			if ($(plugin.settings.pageNavSelector).find('a').length > 0) {
				$(plugin.settings.pageNavSelector)
					.find('a')
					.attr('href', $nextPage);
			} else {
				$(plugin.settings.pageNavSelector).append($('<a href="' + $nextPage + '"></a>'));
			}

			window.scrollTo(0, 0);
			$(plugin.settings.contentWrapper).isotope('remove', $('.' + plugin.settings.type));

			$(plugin.settings.contentWrapper)
				.data('infinitescroll')
				.options.loading.msg.find('div')
				.html($(plugin.settings.contentWrapper).data('infinitescroll').options.loading.msgText);
			$(plugin.settings.contentWrapper)
				.data('infinitescroll')
				.options.loading.msg.find('img')
				.show();

			$(plugin.settings.contentWrapper).infinitescroll('update', isSettings);
			$(plugin.settings.contentWrapper).infinitescroll('bind');
			$(plugin.settings.contentWrapper).infinitescroll('retrieve');
		} else {
			$(plugin.settings.contentWrapper).imagesLoaded(function() {
				$(plugin.settings.contentWrapper).isotope({
					itemSelector: '.' + plugin.settings.type
				});
				$('#page_nav').fadeIn();
				if (plugin.settings.type === 'image') {
					$('.' + plugin.settings.type).fadeIn();
				}
				$(plugin.settings.contentWrapper).isotope('layout');
				$('#page_nav').fadeIn();
			});
			$(plugin.settings.contentWrapper).infinitescroll(isSettings, function(newElements) {
				$(plugin.settings.contentWrapper).imagesLoaded(function() {
					$(plugin.settings.contentWrapper).isotope('insert', $(newElements));
					$('.' + plugin.settings.type).fadeIn();
					$(plugin.settings.contentWrapper).isotope('layout');
					if ($init && $(plugin.settings.contentWrapper).data('infinitescroll').options.state.currPage === 1 && $maxPages > 1) {
						$('#page_nav').fadeIn();
					}
					$init = false;
				});
			});
		}
		// $("#page_nav").fadeIn();
		// setTimeout(function(){
		//   $("#page_nav").fadeIn();
		// },500);
		$(plugin.settings.contentWrapper).infinitescroll('pause');
		plugin.filterItems();
	};

	var itemClicked = function(e) {
		e.preventDefault();

		var termId = parseInt($(this).attr('data-option-id'));
		getNexAndMaxPages(termId, function(result) {
			resetMasonry();
		});

		//unselect all links
		$links.attr('data-selected', false);

		// remove any current filters
		$header.find('.filter-selected').remove();

		// select the link that was clicked
		$(this).attr('data-selected', true);

		//create the dynamic selected filter item
		var $selectedFilter = $(plugin.settings.template);
		$selectedFilter.find('.text').text($(this).text());

		$selectedFilter.addClass('invisible');
		$selectedFilter
			.appendTo($header)
			.hide()
			.show();

		// fade in the selected filter
		$selectedFilter.removeClass('invisible');
	};

	// fire up the plugin!
	// call the "constructor" method
	plugin.init();
};

// add the plugin to the jQuery.fn object
$.fn.aposhFilter = function(options) {
	return this.each(function() {
		if (undefined === $(this).data('aposhFilter')) {
			var plugin = new $.aposhFilter(this, options);
			$(this).data('aposhFilter', plugin);
		}
	});
};
