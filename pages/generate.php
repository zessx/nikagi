<?php

$presets = parse_ini_file(ROOT_PATH . '/config/presets.ini', true);
if (isset($_REQUEST['preset']) && isset($presets[$_REQUEST['preset']])) {

    $preset = $presets[$_REQUEST['preset']];
    define('OPT_LENGTH',     $preset['length']);
    define('OPT_LOWERCASES', $preset['lowercases']);
    define('OPT_UPPERCASES', $preset['uppercases']);
    define('OPT_DIGITS',     $preset['digits']);
    define('OPT_SYMBOLS',    $preset['symbols']);
    define('OPT_AUTOFILL',   true);

    define('PUBLIC_KEY',     $_REQUEST['preset']);

} else {

    define('OPT_LENGTH',     isset($_REQUEST['length'])     ? $_REQUEST['length']           : DEFAULT_LENGTH);
    define('OPT_LOWERCASES', isset($_REQUEST['lowercases']) ? (bool)$_REQUEST['lowercases'] : DEFAULT_LOWERCASES);
    define('OPT_UPPERCASES', isset($_REQUEST['uppercases']) ? (bool)$_REQUEST['uppercases'] : DEFAULT_UPPERCASES);
    define('OPT_DIGITS',     isset($_REQUEST['digits'])     ? (bool)$_REQUEST['digits']     : DEFAULT_DIGITS);
    define('OPT_SYMBOLS',    isset($_REQUEST['symbols'])    ? (bool)$_REQUEST['symbols']    : DEFAULT_SYMBOLS);
    define('OPT_AUTOFILL',   isset($_REQUEST['autofill'])   ? true                          : false);

    define('PUBLIC_KEY',     isset($_REQUEST['public_key']) ? $_REQUEST['public_key']       : null);

}

$page_title = '2Keys';
$page_class = '';
$page_button_back  = OPT_AUTOFILL;
$page_button_admin = true;
$page_button_help  = true;
include ROOT_PATH .'/pages/partials/header.php';

?>

<div id="wrapper">
    <form accept-charset="utf-8" onsubmit="event.returnValue=false;return generate();">
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
        <img src="<?php print ROOT_URL ?>/assets/images/logo.svg" alt="2Keys" class="logo">
    </form>
</div>

<?php

include ROOT_PATH .'/pages/partials/footer.php';

?>