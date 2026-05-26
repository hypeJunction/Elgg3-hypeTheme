<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

/**
 * SetSiteIconUrl class.
 */
class SetSiteIconUrl {

	/**
	 * __invoke.
	 *
	 * @param Hook $hook hook
	 *
	 * @return mixed
	 */
	public function __invoke(Hook $hook) {
		return \elgg_get_simplecache_url('theme/logo.svg');
	}
}
