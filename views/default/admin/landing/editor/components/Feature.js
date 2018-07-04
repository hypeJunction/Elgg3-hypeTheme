define(function (require) {

	var Vue = require('elgg/Vue');

	var template = require('text!admin/landing/editor/components/Feature.html');

	Vue.component('landing-editor-feature', {
		template: template,
		props: {
			feature: {
				type: Object
			},
			parentId: {},
			elementId: {}
		},
		methods: {
			resolveInputName: function(prop) {
				return 'blocks[' + this.parentId + '][items][' + this.elementId + '][' + prop + ']';
			},
			deleteFeature: function() {
				this.$emit('delete');
			}
		}
	});

});