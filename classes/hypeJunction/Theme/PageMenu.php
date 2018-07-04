<?php

namespace hypeJunction\Theme;

use Elgg\Hook;
use ElggMenuItem;

class PageMenu {

	/**
	 * Setup page menu
	 *
	 * @param Hook $hook Hook
	 */
	public function __invoke(Hook $hook) {

		$menu = $hook->getValue();
		/* @var $menu \Elgg\Menu\MenuItems */

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:assets',
			'text' => elgg_echo('admin:theme:assets'),
			'href' => 'admin/theme/assets',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:colors',
			'text' => elgg_echo('admin:theme:colors'),
			'href' => 'admin/theme/colors',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:breakpoints',
			'text' => elgg_echo('admin:theme:breakpoints'),
			'href' => 'admin/theme/breakpoints',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:fonts',
			'text' => elgg_echo('admin:theme:fonts'),
			'href' => 'admin/theme/fonts',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:landing',
			'text' => elgg_echo('admin:theme:landing'),
			'href' => 'admin/theme/landing',
			'section' => 'theme',
			'context' => ['admin'],
		]));

	}
}
