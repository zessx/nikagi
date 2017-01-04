<?php

$username = null;
if (isset($_POST['username']) && isset($_POST['password'])) {
    $configFile = ROOT_PATH . '/config/config.ini';
    $config = array(
        'username'   => $_POST['username'],
        'password'   => hash('sha256', '#//' . $_POST['password']),
        'length'     => $_POST['length'],
        'lowercases' => isset($_POST['lowercases']) ? "1" : "0",
        'uppercases' => isset($_POST['uppercases']) ? "1" : "0",
        'digits'     => isset($_POST['digits']) ? "1" : "0",
        'symbols'    => isset($_POST['symbols']) ? "1" : "0"
    );
    writeINI($config, $configFile, false);

    header('location:'. ROOT_URL .'/');
    die;
}

define('OPT_LENGTH',     isset($config['length'])     ? $config['length']           : 16);
define('OPT_LOWERCASES', isset($config['lowercases']) ? (bool)$config['lowercases'] : true);
define('OPT_UPPERCASES', isset($config['uppercases']) ? (bool)$config['uppercases'] : true);
define('OPT_DIGITS',     isset($config['digits'])     ? (bool)$config['digits']     : true);
define('OPT_SYMBOLS',    isset($config['symbols'])    ? (bool)$config['symbols']    : true);

$page_title = '2Keys - Installation';
$page_class = 'admin';
$page_button_help  = true;
include ROOT_PATH .'/pages/partials/header.php';

?>

<form action="<?php print ROOT_URL ?>/?login" method="post" accept-charset="utf-8">

    <fieldset>
        <legend>Admin account</legend>
        <div class="input-wrapper">
            <input type="text" name="username" id="username" autocomplete="off" autocapitalize="none" required>
            <label for="username">Username</label>
        </div>
        <div class="input-wrapper">
            <input type="password" name="password" id="password" autocomplete="off" autocapitalize="none" required>
            <label for="password">Password</label>
        </div>
    </fieldset>

    <fieldset>
        <legend>Default values</legend>
        <div class="input-wrapper">
            <label for="length">Use </label>
            <input type="number" name="length" id="length" min="4" max="32" autocomplete="off" value="<?php print OPT_LENGTH ?>">
            <label for="length"> characters</label>
        </div>
        <div class="input-wrapper">
            <input type="checkbox" name="lowercases" id="lowercases" value="1"<?php print OPT_LOWERCASES ? ' checked' : '' ?>>
            <label for="lowercases">with lowercases</label>
        </div>
        <div class="input-wrapper">
            <input type="checkbox" name="uppercases" id="uppercases" value="1"<?php print OPT_UPPERCASES ? ' checked' : '' ?>>
            <label for="uppercases">with uppercases</label>
        </div>
        <div class="input-wrapper">
            <input type="checkbox" name="digits" id="digits" value="1"<?php print OPT_DIGITS ? ' checked' : '' ?>>
            <label for="digits">with digits</label>
        </div>
        <div class="input-wrapper">
            <input type="checkbox" name="symbols" id="symbols" value="1"<?php print OPT_SYMBOLS ? ' checked' : '' ?>>
            <label for="symbols">with symbols</label>
        </div>
    </fieldset>

    <input type="submit" value="Finish installation">
    <img src="<?php print ROOT_URL ?>/assets/images/logo.svg" alt="2Keys" class="logo">
</form>

<?php

include ROOT_PATH .'/pages/partials/footer.php';

?>