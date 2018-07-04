blockquote {
	background: $(background-color-mild);
	color: $(text-color-strong);
	border-color: $(border-color-highlight);
	border-width: 0 0 0 4px;
}

pre, code {
	background: $(background-color-mild);
	color: $(text-color-strong);
}

<?php
$props = \hypeJunction\Theme\Fonts::instance()->getProps();

foreach ($props as $prop => $opts) {
	$selector = $opts['selector'];

	echo "$selector { 
		font-family: \$(font-family-$prop, \$(font-family));
		font-weight: \$(font-weight-$prop, normal);
	}";
}
?>

