<?php

namespace hypeJunction\Theme;

use Elgg\Event;
use ElggMenuItem;

/**
 * PageMenu class.
 */
class PageMenu {

	/**
	 * Setup page menu
	 *
	 * @param Event $event Event
	 *
	 * @return void
	 */
	public function __invoke(Event $event) {

		$menu = $event->getValue();
		/* @var $menu \Elgg\Menu\MenuItems */

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:assets',
			'text' => \elgg_echo('admin:theme:assets'),
			'href' => 'admin/theme/assets',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:colors',
			'text' => \elgg_echo('admin:theme:colors'),
			'href' => 'admin/theme/colors',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:breakpoints',
			'text' => \elgg_echo('admin:theme:breakpoints'),
			'href' => 'admin/theme/breakpoints',
			'section' => 'theme',
			'context' => ['admin'],
		]));

		$menu->add(ElggMenuItem::factory([
			'name' => 'admin:theme:fonts',
			'text' => \elgg_echo('admin:theme:fonts'),
			'href' => 'admin/theme/fonts',
			'section' => 'theme',
			'context' => ['admin'],
		]));
	}
}
