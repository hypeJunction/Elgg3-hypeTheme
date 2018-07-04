define(function (require) {

	var Ajax = require('elgg/Ajax');
	var Vue = require('elgg/Vue');

	var template = require('text!admin/landing/editor/components/App.html');

	Vue.component('landing-editor-app', {
		template: template,
		props: {
			pageData: {
				type: Array
			}
		},
		data: function () {
			return {
				blocks: this.pageData,
				draggableOptions: {
					handle: '.landing-editor__block-drag-handle'
				},
				loading: false
			};
		},
		methods: {
			save: function () {
				var self = this;
				var ajax = new Ajax();

				self.loading = true;
				ajax.action('landing/editor/save', {
					data: new FormData(this.$refs.form)
				}).done(function () {
					self.loading = false;
				}).fail(function () {
					self.loading = false;
				});
			},
			resolveComponentName: function (block) {
				return 'landing-editor-' + block.type;
			}
		}
	});

});