<?php

$file = \Elgg\Project\Paths::elgg() . 'engine/theme.php';
$default_vars = \Elgg\Includer::includeFile($file);

$vars = elgg_trigger_plugin_hook('vars:compiler', 'css', null, $default_vars);
?>
    <table class="elgg-table-alt">
        <tbody>
		<?php
		foreach ($vars as $key => $value) {

			if (!preg_match('/^\#[0-9A-F]{6}$/i', $value)) {
				continue;
			}

			?>
            <tr>
                <td><?= elgg_echo("theme:var:$key") ?></td>
                <td><?php
					echo elgg_view_field([
						'#type' => 'text',
						'type' => 'color',
						'class' => 'elgg-input-color',
						'name' => "vars[$key]",
						'value' => $value,
					]);
					?></td>
            </tr>
			<?php
		}
		?>
        </tbody>
    </table>

<?php

$footer = elgg_view_field([
	'#type' => 'submit',
    'value' => elgg_echo('save'),
]);

elgg_set_form_footer($footer);