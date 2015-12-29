<?php

define('OPT_LENGTH',    isset($_REQUEST['length'])     ? $_REQUEST['length']     : 16);
define('OPT_LOWERCASE', isset($_REQUEST['lowercase'])  ? $_REQUEST['lowercase']  : true);
define('OPT_UPPERCASE', isset($_REQUEST['uppercase'])  ? $_REQUEST['uppercase']  : true);
define('OPT_DIGIT',     isset($_REQUEST['digit'])      ? $_REQUEST['digit']      : true);
define('OPT_SYMBOL',    isset($_REQUEST['symbol'])     ? $_REQUEST['symbol']     : true);
define('OPT_AUTOFILL',  isset($_REQUEST['autofill'])   ? true                    : false);

define('PUBLIC_KEY',    isset($_REQUEST['public_key']) ? $_REQUEST['public_key'] : null);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Passmaker</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="robots" content="noindex,nofollow">
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
			<input type="checkbox" name="lowercase" id="lowercase" value="1"<?php print OPT_LOWERCASE ? ' checked' : '' ?>>
			<label for="lowercase">with lowercases</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="uppercase" id="uppercase" value="1"<?php print OPT_UPPERCASE ? ' checked' : '' ?>>
			<label for="uppercase">with uppercases</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="digit" id="digit" value="1"<?php print OPT_DIGIT ? ' checked' : '' ?>>
			<label for="digit">with digits</label>
		</div>
		<div class="input-wrapper"<?php print OPT_AUTOFILL ? ' hidden' : '' ?>>
			<input type="checkbox" name="symbol" id="symbol" value="1"<?php print OPT_SYMBOL ? ' checked' : '' ?>>
			<label for="symbol">with symbols</label>
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
	</form>
</body>
</html>