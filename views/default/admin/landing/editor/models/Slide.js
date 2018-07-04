define(function (require) {
	var elgg = require('elgg');

	return function () {
		return {
			title: 'Title',
			description: 'Description',
			img: {
				view: 'theme/images/unsplash5.jpg',
				url: elgg.get_simplecache_url('theme/images/unsplash5.jpg'),
				file: null
			}
		};
	};
});