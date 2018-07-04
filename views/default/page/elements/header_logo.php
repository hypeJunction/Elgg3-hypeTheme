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
	}
}

echo elgg_format_element('div', [
	'class' => 'elgg-heading-site'
], elgg_view('output/url', [
	'text' => $text,
	'href' => $site->getURL(),
]));
