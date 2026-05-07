<?php

namespace hypeJunction\Theme;

use Elgg\IntegrationTestCase;

class PluginSettingsLowercaseTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'hypetheme';
	}

	public function up(): void {
	}

	public function down(): void {
	}

	/**
	 * Regression: Elgg 4.x ElggPlugin::getSetting() uses lowercase plugin IDs only.
	 * Calls with the legacy camelCase ID `hypeTheme` silently return false (NOT
	 * the configured default), so every theme variable lookup against `hypeTheme`
	 * would silently fall through to the seed default.
	 */
	public function testLowercasePluginIdResolvesSettings(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		$plugin->setSetting('integration_test_marker', 'lowercase_works');

		try {
			$this->assertSame(
				'lowercase_works',
				elgg_get_plugin_setting('integration_test_marker', 'hypetheme')
			);
		} finally {
			$plugin->unsetSetting('integration_test_marker');
		}
	}

	public function testCamelCasePluginIdDoesNotResolve(): void {
		$camel = elgg_get_plugin_from_id('hypeTheme');
		$lower = elgg_get_plugin_from_id('hypetheme');

		$this->assertInstanceOf(\ElggPlugin::class, $lower);
		$this->assertNotEquals($lower, $camel);
		$this->assertTrue($camel === null || $camel === false);
	}

	public function testThemeVarsRoundTripUnderLowercaseId(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		$plugin->setSetting('theme:vars:test-color', '#ff00ff');
		$plugin->setSetting('breakpoint:tablet', 60);

		try {
			$this->assertSame('#ff00ff', elgg_get_plugin_setting('theme:vars:test-color', 'hypetheme'));
			$this->assertSame('60', (string) elgg_get_plugin_setting('breakpoint:tablet', 'hypetheme'));
		} finally {
			$plugin->unsetSetting('theme:vars:test-color');
			$plugin->unsetSetting('breakpoint:tablet');
		}
	}
}
