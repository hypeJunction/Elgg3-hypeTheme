<?php

namespace hypeJunction\Theme;

use Elgg\IntegrationTestCase;

class BootstrapTest extends IntegrationTestCase {

	public function getPluginID(): string {
		return 'hypetheme';
	}

	public function up(): void {
	}

	public function down(): void {
	}

	public function testPluginIsActive(): void {
		$plugin = elgg_get_plugin_from_id('hypetheme');
		$this->assertInstanceOf(\ElggPlugin::class, $plugin);
		$this->assertTrue($plugin->isActive());
	}

	public function testPageMenuHookHandlerIsRegistered(): void {
		$this->assertTrue(_elgg_services()->hooks->hasHandler('register', 'menu:page'));
	}

	public function testCssCompilerHookHandlerIsRegistered(): void {
		$this->assertTrue(_elgg_services()->hooks->hasHandler('vars:compiler', 'css'));
	}

	public function testSiteIconUrlHookHandlerIsRegistered(): void {
		$this->assertTrue(_elgg_services()->hooks->hasHandler('entity:icon:url', 'site'));
	}

	public function testPageShellHookHandlerIsRegistered(): void {
		$this->assertTrue(_elgg_services()->hooks->hasHandler('shell', 'page'));
	}

	public function testColorsActionIsRegistered(): void {
		$actions = _elgg_services()->actions->getAllActions();
		$this->assertArrayHasKey('admin/theme/colors', $actions);
		$this->assertSame('admin', $actions['admin/theme/colors']['access']);
	}

	public function testBreakpointsActionIsRegistered(): void {
		$actions = _elgg_services()->actions->getAllActions();
		$this->assertArrayHasKey('admin/theme/breakpoints', $actions);
		$this->assertSame('admin', $actions['admin/theme/breakpoints']['access']);
	}

	public function testFontsActionIsRegistered(): void {
		$actions = _elgg_services()->actions->getAllActions();
		$this->assertArrayHasKey('admin/theme/fonts', $actions);
		$this->assertSame('admin', $actions['admin/theme/fonts']['access']);
	}

	public function testAssetsActionIsRegistered(): void {
		$actions = _elgg_services()->actions->getAllActions();
		$this->assertArrayHasKey('admin/theme/assets', $actions);
		$this->assertSame('admin', $actions['admin/theme/assets']['access']);
	}

	public function testThemeFontsServiceIsRegistered(): void {
		$this->assertInstanceOf(Fonts::class, elgg()->get('theme.fonts'));
	}

	public function testColorsFormViewExists(): void {
		$this->assertTrue(elgg_view_exists('forms/admin/theme/colors'));
	}

	public function testBreakpointsFormViewExists(): void {
		$this->assertTrue(elgg_view_exists('forms/admin/theme/breakpoints'));
	}

	public function testFontsFormViewExists(): void {
		$this->assertTrue(elgg_view_exists('forms/admin/theme/fonts'));
	}
}
