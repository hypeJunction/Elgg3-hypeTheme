<?php

$families = \hypeJunction\Theme\Fonts::instance()->getFamilies();

$options_values = ['' => ''];

foreach ($families as $family => $variants) {
	$url_family = str_replace(' ', '+', $family);
	$url_family .= ':' . implode(',', $variants);
	$url = "https://fonts.googleapis.com/css?family=$url_family";

	// (4.x) elgg_register_css / elgg_load_css removed. Inline an
	// @import for the external Google Fonts URL so the preview swatch
	// still renders in the admin font picker. Acceptable in this form-
	// only, admin-only view.
	echo '<style>@import url(' . htmlspecialchars(json_encode($url), ENT_QUOTES) . ');</style>';

	$options_values[$family] = [
		'text' => $family,
		'value' => $family,
		'style' => "font-family: '$family'"
	];
}

$props = \hypeJunction\Theme\Fonts::instance()->getProps();

foreach ($props as $prop => $opts) {
	$value = \hypeJunction\Theme\Fonts::instance()->getValue($prop);
	if (!$value) {
		$value = (object) elgg_extract('default', $opts);
	}

	echo elgg_view_field([
		'#type' => 'fieldset',
		'#label' => $opts['label'],
		'#help' => $opts['selector'],
		'align' => 'horizontal',
		'fields' => [
			[
				'#type' => 'select',
				'#label' => elgg_echo('fonts:family'),
				'placeholder' => elgg_echo('fonts:family:placeholder'),
				'options_values' => $options_values,
				'name' => "fonts[$prop][font-family]",
				'value' => $value->{'font-family'},
			],
			[
				'#type' => 'select',
				'#label' => elgg_echo('fonts:weight'),
				'placeholder' => elgg_echo('fonts:weight:placeholder'),
				'options' => [100, 200, 300, 400, 500, 600, 700, 800, 900],
				'name' => "fonts[$prop][font-weight]",
				'value' => $value->{'font-weight'} ?: 400,
			],
		]
	]);
}

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);
