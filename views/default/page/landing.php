<?php

$sections = [
	'messages' => elgg_view('page/elements/messages', [
		'object' => elgg_extract('sysmessages', $vars),
	]),
	'topbar' => elgg_view('page/elements/topbar', $vars),
	'footer' => elgg_view('page/elements/footer', $vars),
];

foreach ($sections as $section => $content) {
	$sections[$section] = elgg_view('page/elements/section', [
		'section' => $section,
		'html' => $content,
		'page_shell' => elgg_extract('page_shell', $vars),
	]);
}

$page = '';
$page .= $sections['messages'];
$page .= $sections['topbar'];

$page .= elgg_view('theme/landing', [
	'blocks' => elgg_trigger_plugin_hook('blocks', 'landing', null, []),
]);

$page .= $sections['footer'];

$page_vars = elgg_extract('page_attrs', $vars, []);
$page_vars['class'] = elgg_extract_class($page_vars, ['elgg-page', 'elgg-page-default', 'elgg-page-landing']);

$body = elgg_format_element('div', $page_vars, $page);

$body .= elgg_view('page/elements/foot');

$head = elgg_view('page/elements/head', elgg_extract('head', $vars, []));

$params = [
	'head' => $head,
	'body' => $body,
	'body_attrs' => elgg_extract('body_attrs', $vars, []),
	'html_attrs' => elgg_extract('html_attrs', $vars, []),
];

echo elgg_view('page/elements/html', $params);
