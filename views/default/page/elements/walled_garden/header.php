<?php
/**
 * Elgg header logo
 */

$site = elgg_get_site_entity();

$text = $site->getDisplayName();

foreach (['svg', 'png', 'gif', 'jpg'] as $ext) {
	if (elgg_view_exists("theme/topbar-logo.$ext")) {
		$text = elgg_format_element('img', [
			'src' => elgg_get_simplecache_url("theme/topbar-logo.$ext"),
			'alt' => 'Logo',
		]);
		break;
	}
}

echo elgg_format_element('h1', [
	'class' => 'elgg-heading-walled-garden'
], elgg_view('output/url', [
	'text' => $text,
	'href' => $site->getURL(),
]));
