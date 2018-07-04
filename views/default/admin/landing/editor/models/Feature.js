define(function (require) {
	var elgg = require('elgg');

	return function () {
		return {
			title: 'Title',
			description: 'Description',
			img: {
				view: 'theme/icons/placeholder.svg',
				url: elgg.get_simplecache_url('theme/icons/placeholder.svg'),
				file: null
			}
		};
	};
});