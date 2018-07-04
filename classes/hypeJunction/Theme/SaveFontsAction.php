<?php

namespace hypeJunction\Theme;

use Elgg\Http\ResponseBuilder;
use Elgg\Request;

class SaveFontsAction {

	/**
	 * Save fonts config
	 *
	 * @param Request $request Request
	 * @return ResponseBuilder
	 */
	public function __invoke(Request $request) {

		$fonts = $request->getParam('fonts');

		$families = [];
		foreach ($fonts as $prop => $values) {

			$family = elgg_extract('font-family', $values);
			$families[$family][] = elgg_extract('font-weight', $values);

			Fonts::instance()->setValue($prop, (object) $values);
		}

		$families = array_map(function($e) {
			return array_unique($e);
		}, $families);

		elgg_save_config('theme.fonts', $families);

		elgg_flush_caches();

		return elgg_ok_response();
	}
}