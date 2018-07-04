<?php

namespace hypeJunction\Theme;

use Elgg\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SaveLandingDataAction {

	public function __invoke(Request $request) {

		$config = [];

		$blocks = $request->getParam('blocks', [], false);
		$uploads = elgg_get_uploaded_files('blocks');

		foreach ($blocks as $i => $block) {
			$type = elgg_extract('type', $block);
			switch ($type) {
				case 'hero' :
					$config[] = $this->saveHero($block, elgg_extract($i, $uploads, []));
					break;

				case 'features' :
					$config[] = $this->saveFeatures($block, elgg_extract($i, $uploads, []));
					break;

				case 'slides' :
					$config[] = $this->saveSlides($block, elgg_extract($i, $uploads, []));
					break;
			}
		}

		elgg_save_config('landing.blocks', $config);

		elgg_flush_caches();

		return elgg_ok_response($config, elgg_echo('admin:theme:landing:success'));
	}

	public function saveFile($file, $basename = null) {
		if (!$file instanceof UploadedFile || !$file->isValid()) {
			return false;
		}

		if ($basename) {
			$ext = $file->getClientOriginalExtension();
			$filename = "$basename.$ext";
		} else {
			$filename = $file->getClientOriginalName();
		}

		try {
			$file = $file->move($this->getStoragePath(), $filename);
		} catch (\Exception $ex) {
			return false;
		}

		return 'theme/landing/' . $file->getFilename();
	}

	public function saveHero(array $input = [], array $files = []) {
		$config = [
			'type' => 'hero',
		];

		$props = [
			'heading' => 'text',
			'tagline' => 'text',
			'img' => 'file',
			'bg' => 'file',
		];

		foreach ($props as $prop => $type) {
			switch ($type) {
				case 'text' :
					$config['data'][$prop] = elgg_extract($prop, $input);
					break;

				case 'file' :
					$file = elgg_extract($prop, $files);
					$view = $this->saveFile($file);
					if ($view) {
						$config['data'][$prop] = $view;
					} else {
						$config['data'][$prop] = elgg_extract($prop, $input);
					}
					break;
			}
		}

		return $config;
	}

	public function saveFeatures(array $input = [], array $files = []) {
		$config = [
			'type' => 'features',
		];

		$items = elgg_extract('items', $input, []);

		foreach ($items as $key => $item) {
			$features_files = isset($files['items'][$key]) ? $files['items'][$key] : [];
			$config['data']['items'][] = $this->saveFeature($item, $features_files);
		}

		return $config;
	}

	public function saveFeature(array $input = [], array $files = []) {
		$props = [
			'title' => 'text',
			'description' => 'text',
			'img' => 'file',
		];

		foreach ($props as $prop => $type) {
			switch ($type) {
				case 'text' :
					$config[$prop] = elgg_extract($prop, $input);
					break;

				case 'file' :
					$file = elgg_extract($prop, $files);
					$view = $this->saveFile($file);
					if ($view) {
						$config[$prop] = $view;
					} else {
						$config[$prop] = elgg_extract($prop, $input);
					}
					break;
			}
		}

		return $config;
	}

	public function saveSlides(array $input = [], array $files = []) {
		$config = [
			'type' => 'slides',
		];

		$items = elgg_extract('items', $input, []);

		foreach ($items as $key => $item) {
			$slide_files = isset($files['items'][$key]) ? $files['items'][$key] : [];
			$config['data']['items'][] = $this->saveSlide($item, $slide_files);
		}

		return $config;
	}

	public function saveSlide(array $input = [], array $files = []) {
		$props = [
			'title' => 'text',
			'description' => 'text',
			'img' => 'file',
		];

		foreach ($props as $prop => $type) {
			switch ($type) {
				case 'text' :
					$config[$prop] = elgg_extract($prop, $input);
					break;

				case 'file' :
					$file = elgg_extract($prop, $files);
					$view = $this->saveFile($file);
					if ($view) {
						$config[$prop] = $view;
					} else {
						$config[$prop] = elgg_extract($prop, $input);
					}
					break;
			}
		}

		return $config;
	}

	public function getStoragePath() {
		return elgg_get_data_path() . 'theme/landing/';
	}
}