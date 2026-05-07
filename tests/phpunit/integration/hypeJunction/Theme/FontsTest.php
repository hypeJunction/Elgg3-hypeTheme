<?php

namespace hypeJunction\Theme;

use Elgg\IntegrationTestCase;

class FontsTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'hypetheme';
	}

	public function up(): void {
	}

	public function down(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		foreach (Fonts::instance()->getProps() as $prop => $_) {
			$plugin->unsetSetting("font:$prop");
		}
	}

	public function testGetPropsReturnsExpectedKeys(): void {
		$props = Fonts::instance()->getProps();

		$this->assertNotEmpty($props);
		foreach (['page', 'heading-default', 'button', 'menu', 'monospace'] as $expected) {
			$this->assertArrayHasKey($expected, $props);
			$this->assertArrayHasKey('selector', $props[$expected]);
			$this->assertArrayHasKey('default', $props[$expected]);
		}
	}

	public function testGetFamiliesReturnsKnownGoogleFonts(): void {
		$families = Fonts::instance()->getFamilies();

		$this->assertNotEmpty($families);
		$this->assertArrayHasKey('Roboto', $families);
		$this->assertArrayHasKey('Open Sans', $families);
		$this->assertArrayHasKey('Poppins', $families);
	}

	public function testSetValueAndGetValueRoundTrip(): void {
		$values = (object) [
			'font-family' => 'Roboto',
			'font-weight' => 700,
		];

		Fonts::instance()->setValue('button', $values);

		$got = Fonts::instance()->getValue('button');
		$this->assertEquals($values, $got);
	}

	public function testGetValueReturnsNullWhenUnset(): void {
		$this->assertNull(Fonts::instance()->getValue('not-a-real-prop-xyz'));
	}

	public function testFontsAreStoredOnHypethemePlugin(): void {
		$values = (object) ['font-family' => 'Lato', 'font-weight' => 400];
		Fonts::instance()->setValue('page', $values);

		// Verify the legacy 'hypeFonts' plugin id is no longer used:
		// settings must be on the lowercase 'hypetheme' entity under font:* keys.
		$raw = elgg_get_plugin_setting('font:page', 'hypetheme');
		$this->assertNotEmpty($raw);
		$this->assertEquals($values, unserialize($raw));
	}
}
