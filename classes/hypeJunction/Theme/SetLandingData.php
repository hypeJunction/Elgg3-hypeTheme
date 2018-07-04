<?php

namespace hypeJunction\Theme;

use Elgg\Hook;

class SetLandingData {

	public function __invoke(Hook $hook) {

		if (!$data = elgg_get_config('landing.blocks')) {
			$data = $this->getFakeData();
		}

		$data = $this->normalizeData($data);

		return $data;
	}

	public function normalizeData($data) {
		$normalize_value = function ($name, $value) use (&$normalize_value) {
			if (is_array($value)) {
				foreach ($value as $k => $v) {
					$value[$k] = $normalize_value($k, $v);
				}
			} else if (in_array($name, ['img', 'bg'])) {
				if (!_elgg_sane_validate_url($value)) {
					$value = [
						'view' => $value,
						'url' => elgg_get_simplecache_url($value),
						'file' => null,
					];
				} else {
					$value = [
						'view' => null,
						'url' => $value,
						'file' => null,
					];
				}
			}

			return $value;
		};

		foreach ($data as &$component) {
			$component_data = elgg_extract('data', $component);
			foreach ($component_data as $key => $value) {
				$component['data'][$key] = $normalize_value($key, $value);
			}

			if ($component['type'] === 'slides') {
				$component['config']['slick'] = [
					'infinite' => true,
					'arrows' => false,
					'dots' => true,
					'autoplay' => true,
					'speed' => 500,
				];
			}
		}

		return $data;
	}

	public function getFakeData() {
		$faker = \Faker\Factory::create();

		return [
			[
				'type' => 'hero',
				'data' => [
					'heading' => ucfirst($faker->words(4, true)),
					'tagline' => ucfirst($faker->words(16, true)),
					'img' => 'theme/hero-placeholder.svg',
					'bg' => 'theme/pattern.svg',
				],
				'config' => [],
			],
			[
				'type' => 'features',
				'data' => [
					'items' => [
						[
							'img' => 'theme/icons/1.svg',
							'title' => ucfirst($faker->words(4, true)),
							'description' => ucfirst($faker->words(12, true)),
						],
						[
							'img' => 'theme/icons/2.svg',
							'title' => ucfirst($faker->words(4, true)),
							'description' => ucfirst($faker->words(12, true)),
						],
						[
							'img' => 'theme/icons/3.svg',
							'title' => ucfirst($faker->words(4, true)),
							'description' => ucfirst($faker->words(12, true)),
						],
						[
							'img' => 'theme/icons/4.svg',
							'title' => ucfirst($faker->words(4, true)),
							'description' => ucfirst($faker->words(12, true)),
						],
						[
							'img' => 'theme/icons/5.svg',
							'title' => ucfirst($faker->words(4, true)),
							'description' => ucfirst($faker->words(12, true)),
						],
						[
							'img' => 'theme/icons/6.svg',
							'title' => ucfirst($faker->words(4, true)),
							'description' => ucfirst($faker->words(12, true)),
						],
					],
				],
				'config' => [],
			],
			[
				'type' => 'slides',
				'data' => [
					'items' => [
						[
							'img' => 'theme/images/unsplash1.jpg',
							'title' => ucfirst($faker->words(5, true)),
							'description' => $faker->paragraphs(3, true),
						],
						[
							'img' => 'theme/images/unsplash2.jpg',
							'title' => ucfirst($faker->words(5, true)),
							'description' => $faker->paragraphs(3, true),
						],
						[
							'img' => 'theme/images/unsplash3.jpg',
							'title' => ucfirst($faker->words(5, true)),
							'description' => $faker->paragraphs(3, true),
						],
						[
							'img' => 'theme/images/unsplash4.jpg',
							'title' => ucfirst($faker->words(5, true)),
							'description' => $faker->paragraphs(3, true),
						],
					],
				],
				'config' => []
			],
		];
	}
}