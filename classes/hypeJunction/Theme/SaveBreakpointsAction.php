<?php

namespace hypeJunction\Theme;

use Elgg\Request;

/**
 * SaveBreakpointsAction class.
 */
class SaveBreakpointsAction {

	/**
	 * __invoke.
	 *
	 * @param Request $request request
	 *
	 * @return mixed
	 */
	public function __invoke(Request $request) {

		$tablet = $request->getParam('tablet') ?: 50;
		$desktop = $request->getParam('desktop') ?: 80;

		$plugin = elgg_get_plugin_from_id('hypetheme');
		$plugin->setSetting('breakpoint:tablet', $tablet);
		$plugin->setSetting('breakpoint:desktop', $desktop);

		elgg_flush_caches();

		return elgg_ok_response('', elgg_echo('admin:theme:breakpoints:success'));
	}
}
