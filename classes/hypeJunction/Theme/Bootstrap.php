<?php

namespace hypeJunction\Theme;

use Elgg\Includer;
use Elgg\PluginBootstrap;

class Bootstrap extends PluginBootstrap {

	/**
	 * Get plugin root
	 * @return string
	 */
	protected function getRoot() {
		return $this->plugin->getPath();
	}

	/**
	 * {@inheritdoc}
	 */
	public function load() {
		Includer::requireFileOnce($this->getRoot() . '/autoloader.php');
	}

	/**
	 * {@inheritdoc}
	 */
	public function boot() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function init() {
		elgg_register_css('elgg.walled_garden', elgg_get_simplecache_url('walled_garden.css'));

		elgg_extend_view('elements/buttons.css', 'theme/elements/buttons.css');
		elgg_extend_view('elements/components.css', 'theme/elements/components.css');
		elgg_extend_view('elements/icons.css', 'theme/elements/icons.css');
		elgg_extend_view('elements/layout.css', 'theme/elements/topbar.css');
		elgg_extend_view('elements/modules.css', 'theme/elements/modules.css');
		elgg_extend_view('elements/widgets.css', 'theme/elements/widgets.css');
		elgg_extend_view('elements/navigation.css', 'theme/elements/navigation.css');
		elgg_extend_view('elements/misc.css', 'theme/elements/misc.css');
		elgg_extend_view('elements/typography.css', 'elements/fonts.css', 100);
		elgg_extend_view('elements/typography.css', 'theme/elements/typography.css');
		elgg_extend_view('elgg.css', 'theme/elements/plugins.css');
		elgg_extend_view('elements/forms.css', 'elements/forms/colorpicker.css');
		elgg_extend_view('walled_garden.css', 'theme/elements/walled_garden.css');

		elgg_register_plugin_hook_handler('register', 'menu:page', PageMenu::class);

		elgg_register_plugin_hook_handler('vars:compiler', 'css', SetThemeVars::class, 800);

		elgg_register_plugin_hook_handler('entity:icon:url', 'site', SetSiteIconUrl::class);

		elgg_register_simplecache_view('elements/fonts.css');

		elgg_register_plugin_hook_handler('shell', 'page', SetPageShell::class);
	}

	/**
	 * {@inheritdoc}
	 */
	public function ready() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function shutdown() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function activate() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function deactivate() {

	}

	/**
	 * {@inheritdoc}
	 */
	public function upgrade() {

	}

}