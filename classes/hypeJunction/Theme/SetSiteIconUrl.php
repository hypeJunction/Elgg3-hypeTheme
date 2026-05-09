<?php

namespace hypeJunction\Theme;

use Elgg\Event;

/**
 * SetSiteIconUrl class.
 */
class SetSiteIconUrl {

	/**
	 * __invoke.
	 *
	 * @param Event $event event
	 *
	 * @return mixed
	 */
	public function __invoke(Event $event) {
		return elgg_get_simplecache_url('theme/logo.svg');
	}
}
