<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

/**
 * SetPageShell class.
 */
class SetPageShell {

	/**
	 * __invoke.
	 *
	 * @param Hook $hook hook
	 *
	 * @return mixed
	 */
	public function __invoke(Hook $hook) {

		$identifier = $hook->getParam('identifier');

		switch ($identifier) {
			case 'login':
			case 'register':
			case 'changepassword':
			case 'forgotpassword':
				return 'walled_garden';
		}
	}
}
