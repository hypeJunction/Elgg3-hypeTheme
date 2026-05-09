<?php

namespace hypeJunction\Theme;

use Elgg\Event;

/**
 * SetPageShell class.
 */
class SetPageShell {

	/**
	 * __invoke.
	 *
	 * @param Event $event event
	 *
	 * @return mixed
	 */
	public function __invoke(Event $event) {

		$identifier = $event->getParam('identifier');

		switch ($identifier) {
			case 'login':
			case 'register':
			case 'changepassword':
			case 'forgotpassword':
				return 'walled_garden';
		}
	}
}
