<?php

namespace hypeJunction\Theme;

use Elgg\Di\ServiceFacade;

class Fonts {

	use ServiceFacade;

	/**
	 * {@inheritdoc}
	 */
	public static function name() {
		return 'theme.fonts';
	}

	public function getProps() {
		$props = [
			'page' => [
				'selector' => '.elgg-page',
				'label' => 'Main font',
				'default' => [
					'font-family' => 'Open Sans',
					'font-weight' => 400,
				],
			],
			'heading-default' => [
				'selector' => 'h1, h2, h3, h4, h5, h6',
				'label' => 'Headings',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'heading-page' => [
				'selector' => '.elgg-heading-main',
				'label' => 'Page Headings',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'heading-listing' => [
				'selector' => '.elgg-listing-summary-title',
				'label' => 'Listing Headings',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'page-topbar' => [
				'selector' => '.elgg-page-topbar',
				'label' => 'Topbar Menus',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'page-header' => [
				'selector' => '.elgg-page-header',
				'label' => 'Page Header',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'page-footer' => [
				'selector' => '.elgg-page-footer',
				'label' => 'Page Footer',
				'default' => [
					'font-family' => 'Open Sans',
					'font-weight' => 400,
				],
			],
			'button' => [
				'selector' => '.elgg-button',
				'label' => 'Buttons',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'menu' => [
				'selector' => '.elgg-menu',
				'label' => 'Menus',
				'default' => [
					'font-family' => 'Poppins',
					'font-weight' => 400,
				],
			],
			'help' => [
				'selector' => '.elgg-text-help',
				'label' => 'Help Text',
				'default' => [
					'font-family' => 'Open Sans',
					'font-weight' => 400,
				],
			],
			'monospace' => [
				'selector' => '.elgg-monospace',
				'label' => 'Monospace',
				'default' => [
					'font-family' => 'Monaco',
					'font-weight' => 400,
				],
			],
			'blockquote' => [
				'selector' => '.elgg-blockquote',
				'label' => 'Blockquote',
				'default' => [
					'font-family' => 'Open Sans',
					'font-weight' => 400,
				],
			],
		];

		$props = elgg_trigger_plugin_hook('config', 'fonts', null, $props);

		return $props;
	}

	/**
	 * Set prop value
	 *
	 * @param string    $prop   Prop name
	 * @param \stdClass $values Values
	 *
	 * @return void
	 */
	public function setValue($prop, \stdClass $values) {
		elgg_set_plugin_setting($prop, serialize($values), 'hypeFonts');
	}

	/**
	 * Get prop value
	 *
	 * @param string $prop Prop name
	 *
	 * @return \stdClass|null
	 */
	public function getValue($prop) {
		$value = elgg_get_plugin_setting($prop, 'hypeFonts');
		if ($value) {
			return unserialize($value);
		}
	}

	/**
	 * Get a list of most popular Google Fonts
	 * @return array
	 */
	public function getFamilies() {
		return [
			'Roboto' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Open Sans' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
				],
			'Lato' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Montserrat' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Roboto Condensed' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Oswald' =>
				[
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Source Sans Pro' =>
				[
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Raleway' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Slabo 27px' =>
				[
					'regular',
				],
			'PT Sans' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Roboto Slab' =>
				[
					'100',
					'300',
					'regular',
					'700',
				],
			'Merriweather' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Open Sans Condensed' =>
				[
					'300',
					'300italic',
					'700',
				],
			'Ubuntu' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
				],
			'Noto Sans' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Poppins' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Playfair Display' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Lora' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Roboto Mono' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
				],
			'PT Serif' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Titillium Web' =>
				[
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'900',
				],
			'Arimo' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Muli' =>
				[
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'PT Sans Narrow' =>
				[
					'regular',
					'700',
				],
			'Fira Sans' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Noto Serif' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Nunito' =>
				[
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Inconsolata' =>
				[
					'regular',
					'700',
				],
			'Dosis' =>
				[
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
				],
			'Indie Flower' =>
				[
					'regular',
				],
			'Nanum Gothic' =>
				[
					'regular',
					'700',
					'800',
				],
			'Crimson Text' =>
				[
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'Work Sans' =>
				[
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
					'900',
				],
			'Bitter' =>
				[
					'regular',
					'italic',
					'700',
				],
			'Fjalla One' =>
				[
					'regular',
				],
			'Quicksand' =>
				[
					'300',
					'regular',
					'500',
					'700',
				],
			'Oxygen' =>
				[
					'300',
					'regular',
					'700',
				],
			'Anton' =>
				[
					'regular',
				],
			'Cabin' =>
				[
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'Libre Baskerville' =>
				[
					'regular',
					'italic',
					'700',
				],
			'Rubik' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Hind' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Josefin Sans' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'Exo 2' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Arvo' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Lobster' =>
				[
					'regular',
				],
			'Libre Franklin' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Karla' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Pacifico' =>
				[
					'regular',
				],
			'Abel' =>
				[
					'regular',
				],
			'Yanone Kaffeesatz' =>
				[
					'200',
					'300',
					'regular',
					'700',
				],
			'Varela Round' =>
				[
					'regular',
				],
			'Shadows Into Light' =>
				[
					'regular',
				],
			'Merriweather Sans' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'700',
					'700italic',
					'800',
					'800italic',
				],
			'Nunito Sans' =>
				[
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Ubuntu Condensed' =>
				[
					'regular',
				],
			'Bree Serif' =>
				[
					'regular',
				],
			'Dancing Script' =>
				[
					'regular',
					'700',
				],
			'Exo' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Archivo Narrow' =>
				[
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'Asap' =>
				[
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'Acme' =>
				[
					'regular',
				],
			'Source Serif Pro' =>
				[
					'regular',
					'600',
					'700',
				],
			'Abril Fatface' =>
				[
					'regular',
				],
			'Patua One' =>
				[
					'regular',
				],
			'Hind Siliguri' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Questrial' =>
				[
					'regular',
				],
			'Signika' =>
				[
					'300',
					'regular',
					'600',
					'700',
				],
			'Source Code Pro' =>
				[
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'900',
				],
			'Gloria Hallelujah' =>
				[
					'regular',
				],
			'Kanit' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Play' =>
				[
					'regular',
					'700',
				],
			'Comfortaa' =>
				[
					'300',
					'regular',
					'700',
				],
			'Francois One' =>
				[
					'regular',
				],
			'Amatic SC' =>
				[
					'regular',
					'700',
				],
			'Teko' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Crete Round' =>
				[
					'regular',
					'italic',
				],
			'Cairo' =>
				[
					'200',
					'300',
					'regular',
					'600',
					'700',
					'900',
				],
			'Maven Pro' =>
				[
					'regular',
					'500',
					'700',
					'900',
				],
			'Righteous' =>
				[
					'regular',
				],
			'Rokkitt' =>
				[
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
					'900',
				],
			'EB Garamond' =>
				[
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
				],
			'Rajdhani' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Cuprum' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'PT Sans Caption' =>
				[
					'regular',
					'700',
				],
			'Catamaran' =>
				[
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
					'900',
				],
			'Ropa Sans' =>
				[
					'regular',
					'italic',
				],
			'Vollkorn' =>
				[
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Cinzel' =>
				[
					'regular',
					'700',
					'900',
				],
			'Heebo' =>
				[
					'100',
					'300',
					'regular',
					'500',
					'700',
					'800',
					'900',
				],
			'Encode Sans Condensed' =>
				[
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
					'900',
				],
			'Alegreya' =>
				[
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Permanent Marker' =>
				[
					'regular',
				],
			'Russo One' =>
				[
					'regular',
				],
			'Kaushan Script' =>
				[
					'regular',
				],
			'Poiret One' =>
				[
					'regular',
				],
			'Great Vibes' =>
				[
					'regular',
				],
			'Satisfy' =>
				[
					'regular',
				],
			'Domine' =>
				[
					'regular',
					'700',
				],
			'Concert One' =>
				[
					'regular',
				],
			'Pathway Gothic One' =>
				[
					'regular',
				],
			'Cormorant Garamond' =>
				[
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'ABeeZee' =>
				[
					'regular',
					'italic',
				],
			'Courgette' =>
				[
					'regular',
				],
			'Old Standard TT' =>
				[
					'regular',
					'italic',
					'700',
				],
			'Noticia Text' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Monda' =>
				[
					'regular',
					'700',
				],
			'News Cycle' =>
				[
					'regular',
					'700',
				],
			'Alegreya Sans' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Cookie' =>
				[
					'regular',
				],
			'Archivo Black' =>
				[
					'regular',
				],
			'Orbitron' =>
				[
					'regular',
					'500',
					'700',
					'900',
				],
			'Fira Sans Condensed' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Passion One' =>
				[
					'regular',
					'700',
					'900',
				],
			'Khand' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Quattrocento Sans' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Prompt' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Lobster Two' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Philosopher' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Yantramanav' =>
				[
					'100',
					'300',
					'regular',
					'500',
					'700',
					'900',
				],
			'Cardo' =>
				[
					'regular',
					'italic',
					'700',
				],
			'Tinos' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Amiri' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Assistant' =>
				[
					'200',
					'300',
					'regular',
					'600',
					'700',
					'800',
				],
			'Istok Web' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Quattrocento' =>
				[
					'regular',
					'700',
				],
			'Paytone One' =>
				[
					'regular',
				],
			'Nanum Myeongjo' =>
				[
					'regular',
					'700',
					'800',
				],
			'Alfa Slab One' =>
				[
					'regular',
				],
			'Fredoka One' =>
				[
					'regular',
				],
			'Josefin Slab' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'600',
					'600italic',
					'700',
					'700italic',
				],
			'Monoton' =>
				[
					'regular',
				],
			'Barlow' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Titan One' =>
				[
					'regular',
				],
			'Caveat' =>
				[
					'regular',
					'700',
				],
			'Hind Madurai' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Sacramento' =>
				[
					'regular',
				],
			'Handlee' =>
				[
					'regular',
				],
			'Arapey' =>
				[
					'regular',
					'italic',
				],
			'Gudea' =>
				[
					'regular',
					'italic',
					'700',
				],
			'Bangers' =>
				[
					'regular',
				],
			'Kalam' =>
				[
					'300',
					'regular',
					'700',
				],
			'Playfair Display SC' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
					'900',
					'900italic',
				],
			'Didact Gothic' =>
				[
					'regular',
				],
			'Volkhov' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Tangerine' =>
				[
					'regular',
					'700',
				],
			'BenchNine' =>
				[
					'300',
					'regular',
					'700',
				],
			'Pontano Sans' =>
				[
					'regular',
				],
			'Hammersmith One' =>
				[
					'regular',
				],
			'Fira Sans Extra Condensed' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Economica' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Amaranth' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Ultra' =>
				[
					'regular',
				],
			'Barlow Condensed' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Jura' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Yellowtail' =>
				[
					'regular',
				],
			'Boogaloo' =>
				[
					'regular',
				],
			'Cabin Condensed' =>
				[
					'regular',
					'500',
					'600',
					'700',
				],
			'Luckiest Guy' =>
				[
					'regular',
				],
			'Hind Vadodara' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Sanchez' =>
				[
					'regular',
					'italic',
				],
			'Ruda' =>
				[
					'regular',
					'700',
					'900',
				],
			'Neuton' =>
				[
					'200',
					'300',
					'regular',
					'italic',
					'700',
					'800',
				],
			'Goudy Bookletter 1911' =>
				[
					'regular',
				],
			'Armata' =>
				[
					'regular',
				],
			'Prosto One' =>
				[
					'regular',
				],
			'Barlow Semi Condensed' =>
				[
					'100',
					'100italic',
					'200',
					'200italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'600',
					'600italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Patrick Hand' =>
				[
					'regular',
				],
			'Architects Daughter' =>
				[
					'regular',
				],
			'Pragati Narrow' =>
				[
					'regular',
					'700',
				],
			'Advent Pro' =>
				[
					'100',
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Glegoo' =>
				[
					'regular',
					'700',
				],
			'Marck Script' =>
				[
					'regular',
				],
			'Cantarell' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Audiowide' =>
				[
					'regular',
				],
			'Sorts Mill Goudy' =>
				[
					'regular',
					'italic',
				],
			'Vidaloka' =>
				[
					'regular',
				],
			'Frank Ruhl Libre' =>
				[
					'300',
					'regular',
					'500',
					'700',
					'900',
				],
			'Unica One' =>
				[
					'regular',
				],
			'Alegreya Sans SC' =>
				[
					'100',
					'100italic',
					'300',
					'300italic',
					'regular',
					'italic',
					'500',
					'500italic',
					'700',
					'700italic',
					'800',
					'800italic',
					'900',
					'900italic',
				],
			'Signika Negative' =>
				[
					'300',
					'regular',
					'600',
					'700',
				],
			'Shrikhand' =>
				[
					'regular',
				],
			'Gentium Basic' =>
				[
					'regular',
					'italic',
					'700',
					'700italic',
				],
			'Yrsa' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'Hind Guntur' =>
				[
					'300',
					'regular',
					'500',
					'600',
					'700',
				],
			'PT Mono' =>
				[
					'regular',
				],
			'Shadows Into Light Two' =>
				[
					'regular',
				],
			'Khula' =>
				[
					'300',
					'regular',
					'600',
					'700',
					'800',
				],
			'Enriqueta' =>
				[
					'regular',
					'700',
				],
			'Prata' =>
				[
					'regular',
				],
			'Kreon' =>
				[
					'300',
					'regular',
					'700',
				],
			'Basic' =>
				[
					'regular',
				],
			'Aldrich' =>
				[
					'regular',
				],
			'Changa' =>
				[
					'200',
					'300',
					'regular',
					'500',
					'600',
					'700',
					'800',
				],
			'Antic Slab' =>
				[
					'regular',
				],
			'Cabin Sketch' =>
				[
					'regular',
					'700',
				],
			'Alice' =>
				[
					'regular',
				],
			'Bad Script' =>
				[
					'regular',
				],
			'Julius Sans One' =>
				[
					'regular',
				],
			'Neucha' =>
				[
					'regular',
				],
		];
	}
}