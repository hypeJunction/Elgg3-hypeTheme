define(function (require) {

	var Vue = require('elgg/Vue');

	var template = require('text!admin/landing/editor/components/Slides.html');
	var Slide = require('admin/landing/editor/models/Slide');

	Vue.component('landing-editor-slides', {
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
			addSlide: function() {
				this.block.data.items.push(new Slide());
			},
			deleteSlide: function(index) {
				Vue.delete(this.block.data.items, index);
			},
			resolveInputName: function(prop) {
				return 'blocks[' + this.parentId + '][' + prop + ']';
			}
		}
	});

});