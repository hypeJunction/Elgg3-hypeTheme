define(function(require) {
	var Vue = require('elgg/Vue');

	require('elgg/components/Draggable');
	require('elgg/components/Icon');
	require('elgg/components/InputText');
	require('elgg/components/Button');
	require('elgg/components/InputContentEditable');
	require('elgg/components/InputImage');
	require('elgg/components/InputBackgroundImage');

	require('admin/landing/editor/components/App');
	require('admin/landing/editor/components/Hero');
	require('admin/landing/editor/components/Features');
	require('admin/landing/editor/components/Feature');
	require('admin/landing/editor/components/Slides');
	require('admin/landing/editor/components/Slide');

	var vm = new Vue({
		el: '#landing-editor-app',
	});

	return vm;
});