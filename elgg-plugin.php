<?php

$conf = [
	'bootstrap' => \hypeJunction\Theme\Bootstrap::class,

	'actions' => [
		'admin/theme/colors' => [
			'controller' => \hypeJunction\Theme\SaveColorsAction::class,
			'access' => 'admin',
		],
		'admin/theme/breakpoints' => [
			'controller' => \hypeJunction\Theme\SaveBreakpointsAction::class,
			'access' => 'admin',
		],
		'admin/theme/fonts' => [
			'controller' => \hypeJunction\Theme\SaveFontsAction::class,
			'access' => 'admin',
		],
		'admin/theme/assets' => [
			'controller' => \hypeJunction\Theme\SaveAssetsAction::class,
			'access' => 'admin',
		],
	],

	'views' => [
		'default' => [
			'theme/' => elgg_get_data_path() . 'theme/',
		],
	],

];

return $conf;