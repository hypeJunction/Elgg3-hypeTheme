define(function (require) {

	var Vue = require('elgg/Vue');

	var template = require('text!admin/landing/editor/components/Slide.html');

	Vue.component('landing-editor-slide', {
		template: template,
		props: {
			slide: {
				type: Object
			},
			parentId: {},
			elementId: {}
		},
		methods: {
			resolveInputName: function(prop) {
				return 'blocks[' + this.parentId + '][items][' + this.elementId + '][' + prop + ']';
			},
			deleteSlide: function() {
				this.$emit('delete');
			}
		}
	});

});