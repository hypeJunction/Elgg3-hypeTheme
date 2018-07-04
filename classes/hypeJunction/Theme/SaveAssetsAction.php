<?php

namespace hypeJunction\Theme;

use Elgg\Http\ResponseBuilder;
use Elgg\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class SaveAssetsAction {

	/**
	 * Save assets
	 *
	 * @param Request $request Request
	 * @return ResponseBuilder
	 */
	public function __invoke(Request $request) {

		$assets = [
			'logo.svg',
			'logo.png',
			'topbar-logo.svg',
			'topbar-logo.png',
		];

		foreach ($assets as $asset) {
			$uploads = elgg_get_uploaded_files($asset);
			if (empty($uploads)) {
				continue;
			}

			$upload = array_shift($uploads);
			if (!$upload instanceof UploadedFile) {
				continue;
			}

			if (!$upload->isValid()) {
				register_error(elgg_get_friendly_upload_error($upload->getError()));
				continue;
			}

			if (pathinfo($asset, PATHINFO_EXTENSION) !== $upload->getClientOriginalExtension()) {
				register_error(elgg_echo('theme:upload:error:invalid_format', [
					$upload->getClientOriginalName()
				]));
				continue;
			}

			$target = elgg_get_data_path() . 'theme/' . $asset;
			if (file_exists($target)) {
				unlink($target);
			}

			$upload->move(elgg_get_data_path() . 'theme/', $asset);
		}

		elgg_flush_caches();

		return elgg_ok_response();
	}
}