<?php

define('OPT_LENGTH',     isset($_REQUEST['length'])     ? $_REQUEST['length']     : 16);
define('OPT_LOWERCASES', isset($_REQUEST['lowercases']) ? (bool)$_REQUEST['lowercases'] : true);
define('OPT_UPPERCASES', isset($_REQUEST['uppercase'])  ? (bool)$_REQUEST['uppercase']  : true);
define('OPT_DIGITS',     isset($_REQUEST['digits'])     ? (bool)$_REQUEST['digits']     : true);
define('OPT_SYMBOLS',    isset($_REQUEST['symbols'])    ? (bool)$_REQUEST['symbols']    : true);
define('OPT_AUTOFILL',   isset($_REQUEST['autofill'])   ? true                    : false);

define('PUBLIC_KEY',    isset($_REQUEST['public_key']) ? $_REQUEST['public_key'] : null);

?>
<!DOCTYPE html>
<html>
<head>
	<title>2Keys</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow">
	<link rel="icon" type="image/x-icon" href="/assets/images/favicon.ico">
	<link rel="stylesheet" href="/assets/css/app.css">
	<script src="/assets/js/cryptojs.js"></script>
	<script src="/assets/js/app.js"></script>
</head>
<body>
	<form method="post" accept-charset="utf-8" onsubmit="event.returnValue=false;return generate();">
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<label for="length">Use </label>
			<input type="number" name="length" id="length" min="4" max="32" autocomplete="off" value="<?php print OPT_LENGTH ?>">
			<label for="length"> characters</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="lowercases" id="lowercases" value="1"<?php print OPT_LOWERCASES ? ' checked' : '' ?>>
			<label for="lowercases">with lowercases</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="uppercases" id="uppercases" value="1"<?php print OPT_UPPERCASES ? ' checked' : '' ?>>
			<label for="uppercases">with uppercases</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="digits" id="digits" value="1"<?php print OPT_DIGITS ? ' checked' : '' ?>>
			<label for="digits">with digits</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="symbols" id="symbols" value="1"<?php print OPT_SYMBOLS ? ' checked' : '' ?>>
			<label for="symbols">with symbols</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="text" name="public_key" id="public_key" autocomplete="off" autocapitalize="none" required<?php print PUBLIC_KEY ? ' value="'. PUBLIC_KEY .'"' : '' ?>>
			<label for="public_key">Public key</label>
		</div>
		<div class="input-wrapper">
			<input type="password" name="private_key" id="private_key" autocomplete="off" autocapitalize="none" required<?php print OPT_AUTOFILL ? ' autofocus' : '' ?>>
			<label for="private_key">Private key</label>
		</div>
		<input type="submit" value="Generate password">
		<img src="assets/images/logo.svg" alt="2Keys">
	</form>
</body>
</html>