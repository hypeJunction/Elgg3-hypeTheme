<?php

$families = elgg_get_config('theme.fonts');

if (empty($families)) {
	$families = [
		'Open Sans' => ['400', '600'],
		'Poppins' => ['400', '600', '700'],
	];
}

$url_families = [];
foreach ($families as $family => $variants) {
	$url_family = str_replace(' ', '+', $family);
	$url_family .= ':' . implode(',', $variants);
	$url_families[] = $url_family;
}

$url_families = implode('|', $url_families);

$url = "https://fonts.googleapis.com/css?family=$url_families";

echo "@import url('$url');";