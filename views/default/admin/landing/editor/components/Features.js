define(function (require) {

	var Vue = require('elgg/Vue');

	var template = require('text!admin/landing/editor/components/Features.html');
	var Feature = require('admin/landing/editor/models/Feature');

	Vue.component('landing-editor-features', {
		template: template,
		props: {
			block: {
				type: Object
			},
			parentId: {}
		},
		data: function() {
			return {
				draggableOptions: {
					animation: 150
				}
			};
		},
		methods: {
			addFeature: function() {
				this.block.data.items.push(new Feature());
			},
			deleteFeature: function(index) {
				Vue.delete(this.block.data.items, index);
			},
			resolveInputName: function(prop) {
				return 'blocks[' + this.parentId + '][' + prop + ']';
			}
		}
	});

});