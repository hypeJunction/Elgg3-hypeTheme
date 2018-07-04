<?php

namespace hypeJunction\Theme;

use Elgg\Request;

class SaveBreakpointsAction {

	public function __invoke(Request $request) {

		$tablet = $request->getParam('tablet') ? : 50;
		$desktop = $request->getParam('desktop') ? : 80;

		elgg_set_plugin_setting('breakpoint:tablet', $tablet, 'hypeTheme');
		elgg_set_plugin_setting('breakpoint:desktop', $desktop, 'hypeTheme');

		elgg_flush_caches();

		return elgg_ok_response('', elgg_echo('admin:theme:breakpoints:success'));
	}
}