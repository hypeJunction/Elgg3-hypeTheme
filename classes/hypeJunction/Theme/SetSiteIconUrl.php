<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

class SetSiteIconUrl {

	public function __invoke(Hook $hook) {
		return elgg_get_simplecache_url('theme/logo.svg');
	}
}