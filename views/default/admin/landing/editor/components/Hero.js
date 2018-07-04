define(function (require) {

	var Vue = require('elgg/Vue');

	var template = require('text!admin/landing/editor/components/Hero.html');

	Vue.component('landing-editor-hero', {
		template: template,
		props: {
			block: {
				type: Object
			},
			parentId: {}
		},
		methods: {
			resolveInputName: function(prop) {
				return 'blocks[' + this.parentId + '][' + prop + ']';
			}
		}
	});

});