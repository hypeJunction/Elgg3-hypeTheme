<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

class SetSiteIconUrl {

	/**
     * @param Hook $hook
     * @return mixed
     */
    public function __invoke(Hook $hook) {
		return elgg_get_simplecache_url('theme/logo.svg');
	}
}