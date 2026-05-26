<?php

namespace hypeJunction\Theme;

use Elgg\Request;

/**
 * SaveColorsAction class.
 */
class SaveColorsAction {

	/**
	 * __invoke.
	 *
	 * @param Request $request request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request) {

		$vars = $request->getParam('vars');

		$plugin = \elgg_get_plugin_from_id('hypetheme');
		foreach ($vars as $key => $value) {
			$plugin->setSetting("theme:vars:$key", $value);
		}

		\elgg_flush_caches();

		return \elgg_ok_response('', \elgg_echo('admin:theme:colors:success'));
	}
}
