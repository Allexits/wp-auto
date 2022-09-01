<?php
settings_errors();
?>
<div>
	<form method="post" action="options.php">
		<?php
			settings_fields('booking_settings');
			do_settings_sections('alebooking_set');
			submit_button();

		?>
	</form>
</div>
