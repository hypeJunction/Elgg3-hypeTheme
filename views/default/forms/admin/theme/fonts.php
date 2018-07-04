<?php

$families = \hypeJunction\Theme\Fonts::instance()->getFamilies();

$options_values = ['' => ''];

foreach ($families as $family => $variants) {
	$url_family = str_replace(' ', '+', $family);
	$url_family .= ':' . implode(',', $variants);
	$url = "https://fonts.googleapis.com/css?family=$url_family";

	elgg_register_css("font:$family", $url);
	elgg_load_css("font:$family");

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
				'value' => $value->{'font-weight'} ? : 400,
			],
		]
	]);
}

$footer = elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);