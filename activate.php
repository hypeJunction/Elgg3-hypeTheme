<?php

$assets_dir = elgg_get_data_path() . '/theme/';

if (!is_dir($assets_dir)) {
	mkdir($assets_dir, 0755, true);
}