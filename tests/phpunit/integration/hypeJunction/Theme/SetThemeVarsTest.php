<?php

namespace hypeJunction\Theme;

use Elgg\IntegrationTestCase;

class SetThemeVarsTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'hypetheme';
	}

	public function up(): void {
	}

	public function down(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		$plugin->unsetSetting('theme:vars:anchor-color');
		$plugin->unsetSetting('breakpoint:tablet');
		$plugin->unsetSetting('breakpoint:desktop');
	}

	public function testSeedDefaultsExposedToCssCompiler(): void {
		$result = elgg_trigger_event_results('vars:compiler', 'css', [], []);

		$this->assertIsArray($result);
		$this->assertArrayHasKey('font-size', $result);
		$this->assertArrayHasKey('anchor-color', $result);
		$this->assertArrayHasKey('button-submit-background-color', $result);
	}

	public function testStoredOverrideTakesPrecedenceOverSeedDefault(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		$plugin->setSetting('theme:vars:anchor-color', '#123456');

		$result = elgg_trigger_event_results('vars:compiler', 'css', [], []);

		$this->assertSame('#123456', $result['anchor-color']);
	}

	public function testCustomBreakpointsReplaceMediaQueryDefaults(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		$plugin->setSetting('breakpoint:tablet', 40);
		$plugin->setSetting('breakpoint:desktop', 70);

		$result = elgg_trigger_event_results('vars:compiler', 'css', [], []);

		$this->assertSame('40rem', $result['tablet']);
		$this->assertSame('70rem', $result['desktop']);
		$this->assertStringContainsString('40rem', $result['media-mobile-only']);
		$this->assertStringContainsString('70rem', $result['media-desktop-down']);
	}
}
