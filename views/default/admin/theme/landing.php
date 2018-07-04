<?php

$data = elgg_trigger_plugin_hook('blocks', 'landing', null, []);

$loader = elgg_format_element('div', [
	'class' => 'elgg-ajax-loader',
]);

echo elgg_format_element('landing-editor-app', [
	'id' => 'landing-editor-app',
	':page-data' => json_encode($data, JSON_OBJECT_AS_ARRAY),
], $loader);

elgg_load_css('animate');

elgg_require_js('admin/landing/editor/app');