<?php

$assets = [
	'logo.svg',
	'logo.png',
	'topbar-logo.svg',
	'topbar-logo.png',
];

foreach ($assets as $asset) {
	$view = elgg_view('output/img', [
		'src' => elgg_get_simplecache_url("theme/$asset"),
		'alt' => elgg_echo("assets:$asset"),
		'class' => 'theme-assets__preview',
	]);

	$field = elgg_view_field([
		'#type' => 'file',
		'name' => $asset,
	]);

	echo elgg_view_module('info', elgg_echo("assets:$asset"), $field. $view);
}

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);