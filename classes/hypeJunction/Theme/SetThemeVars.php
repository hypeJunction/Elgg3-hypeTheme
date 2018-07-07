<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

class SetThemeVars {

	public function __invoke(Hook $hook) {

		$vars = $hook->getValue();

		$theme = [
			// layout and shell
			'body-background-color' => '#fafafb',

			// Typography
			'font-size' => '16px', // global font size
			'font-bold-weight' => '500', // weight of <strong> and <b> elements
			'font-family' => '"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif', // global font family

			'anchor-color' => '#485A73',
			'anchor-color-hover' => '#676A8B',

			'h-font-family' => '"Poppins", "Helvetica Neue", Helvetica, Arial, sans-serif',
			'h1-font-size' => '1.8rem',
			'h2-font-size' => '1.5rem',
			'h3-font-size' => '1.2rem',
			'h4-font-size' => '1.0rem',
			'h5-font-size' => '0.9rem',
			'h6-font-size' => '0.8rem',


			// element colors
			'text-color-soft' => '#7c8b96',
			'text-color-mild' => '#5d6870',
			'text-color-strong' => '#1f2225',
			'text-color-highlight' => '#676A8B',

			'background-color-soft' => '#f5f6f8',
			'background-color-mild' => '#ebeef1',
			'background-color-strong' => '#e1e6ea',
			'background-color-highlight' => '#676A8B',

			'border-color-soft' => '#cdd6dd',
			'border-color-mild' => '#c3ced6',
			'border-color-strong' => '#b9c6d0',
			'border-color-highlight' => '#676A8B',

			// messages and notices
			'state-success-font-color' => '#397f2e',
			'state-success-background-color' => '#eaf8e8',
			'state-success-border-color' => '#aadea2',

			'state-danger-font-color' => '#b94a48',
			'state-danger-background-color' => '#f8e8e8',
			'state-danger-border-color' => '#e5b7b5',

			'state-notice-font-color' => '#3b8bc9',
			'state-notice-background-color' => '#e7f1f9',
			'state-notice-border-color' => '#b1d1e9',

			'state-warning-font-color' => '#6b420f',
			'state-warning-background-color' => '#fcf8e4',
			'state-warning-border-color' => '#eddc7d',

			// buttons
			'button-submit-background-color' => '#676A8B',
			'button-submit-font-color' => '#ffffff',
			'button-submit-background-color-hover' => '#5C5F7D',
			'button-submit-font-color-hover' => '#ffffff',

			'button-action-background-color' => '#676A8B',
			'button-action-font-color' => '#ffffff',
			'button-action-background-color-hover' => '#5C5F7D',
			'button-action-font-color-hover' => '#ffffff',

			'button-cancel-background-color' => '#e6e6ea',
			'button-cancel-font-color' => '#2d3047',
			'button-cancel-background-color-hover' => '#cfcfd2',
			'button-cancel-font-color-hover' => '#2d3047',

			'button-delete-background-color' => '#e6e6ea',
			'button-delete-font-color' => '#2d3047',
			'button-delete-background-color-hover' => '#d33f49',
			'button-delete-font-color-hover' => '#ffffff',

			// topbar
			'topbar-background-color' => '#2F4858',
			'topbar-indicator' => '#FCB040',
			'topbar-gradient' => 'linear-gradient(to right bottom,#2f4858,#2c4453,#2a404f,#273d4a,#253946)',

			// breakpoints
			'tablet' => '50rem',
			'desktop' => '80rem',
			'media-tablet-up' => 'screen and (min-width: 50rem)',
			'media-desktop-up' => 'screen and (min-width: 80rem)',
			'media-mobile-only' => 'screen and (max-width: 50rem)',
			'media-desktop-down' => 'screen and (max-width: 80rem)',
			'media-tablet-only' => 'screen and (min-width: 50rem) and (max-width: 80rem)',
		];

		$vars = array_merge($vars, $theme);

		foreach ($vars as $key => $value) {
			$vars[$key] = elgg_get_plugin_setting("theme:vars:$key", 'hypeTheme', $value);
		}

		$tablet = elgg_get_plugin_setting('breakpoint:tablet', 'hypeTheme');
		$desktop = elgg_get_plugin_setting('breakpoint:desktop', 'hypeTheme');

		if ($tablet && $desktop) {
			$tablet_up = $tablet + 0.01;
			$desktop_up = $desktop + 0.01;

			$breakpoints = [
				'tablet' => "{$tablet}rem",
				'desktop' => "{$desktop}rem",
				'media-tablet-up' => "screen and (min-width: {$tablet_up}rem)",
				'media-desktop-up' => "screen and (min-width: {$desktop_up}rem)",
				'media-mobile-only' => "screen and (max-width: {$tablet}rem)",
				'media-desktop-down' => "screen and (max-width: {$desktop}rem)",
				'media-tablet-only' => "screen and (min-width: {$tablet_up}rem) and (max-width: {$desktop}rem)",
			];

			$vars = array_merge($vars, $breakpoints);
		}

		$props = Fonts::instance()->getProps();

		foreach ($props as $prop => $opts) {
			$values = Fonts::instance()->getValue($prop);

			$vars["font-family-{$prop}"] = $values->{'font-family'} ? : $opts['default']['font-family'];
			$vars["font-weight-{$prop}"] = $values->{'font-weight'} ? : $opts['defualt']['font-weight'];
		}

		return $vars;
	}
}