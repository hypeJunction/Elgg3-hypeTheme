<?php

namespace hypeJunction\Theme;

use Elgg\Request;

class SaveColorsAction {

	public function __invoke(Request $request) {

		$vars = $request->getParam('vars');

		foreach ($vars as $key => $value) {
			elgg_set_plugin_setting("theme:vars:$key", $value, 'hypeTheme');
		}

		elgg_flush_caches();

		return elgg_ok_response('', elgg_echo('admin:theme:colors:success'));
	}
}