<?php

echo elgg_view_field([
    '#type' => 'number',
    '#label' => elgg_echo("breakpoint:tablet"),
    '#help' => elgg_echo("breakpoint:tablet:help"),
    'name' => 'tablet',
    'value' => elgg_get_plugin_setting('breakpoint:tablet', 'hypeTheme', 50),
]);

echo elgg_view_field([
	'#type' => 'number',
	'#label' => elgg_echo("breakpoint:desktop"),
	'#help' => elgg_echo("breakpoint:desktop:help"),
	'name' => 'desktop',
	'value' => elgg_get_plugin_setting('breakpoint:desktop', 'hypeTheme', 80),
]);

$footer = elgg_view_field([
	'#type' => 'submit',
    'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);