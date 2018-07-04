<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

class LandingCta {

	public function __invoke(Hook $hook) {

		$menu = $hook->getValue();
		/* @var $menu \Elgg\Menu\MenuItems */

		$menu->add(\ElggMenuItem::factory([
			'name' => 'login',
			'href' => elgg_get_login_url(),
			'text' => elgg_echo('login'),
			'link_class' => 'elgg-button elgg-button-action',
			'item_class' => elgg_is_logged_in() ? 'hidden' : '',
		]));

		$menu->add(\ElggMenuItem::factory([
			'name' => 'register',
			'href' => elgg_get_registration_url(),
			'text' => elgg_echo('register'),
			'link_class' => 'elgg-button elgg-button-action',
			'item_class' => elgg_is_logged_in() ? 'hidden' : '',
		]));

	}
}