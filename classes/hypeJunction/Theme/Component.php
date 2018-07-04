<?php

namespace hypeJunction\Theme;

class Component extends \ArrayObject {

	public function __construct($input = [], int $flags = \ArrayObject::ARRAY_AS_PROPS, string $iterator_class = "ArrayIterator") {
		parent::__construct($input, $flags, $iterator_class);
	}


}