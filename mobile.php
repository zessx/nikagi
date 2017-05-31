<?php

define('ROOT_PATH', dirname(__FILE__));
define('ROOT_URL',  rtrim(dirname($_SERVER['PHP_SELF']), '\\\/'));

ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$presets = parse_ini_file(ROOT_PATH . '/config/presets.ini', true);
if (isset($_REQUEST['preset'])) {
    if (isset($presets[$_REQUEST['preset']])) {
        header('location:/?preset='.$_REQUEST['preset']);
    } else {
        header('location:/?public_key='.$_REQUEST['preset']);
    }
    die;
}

$page_title = 'Nikagi';
$page_class = '';
$page_button_back  = false;
$page_button_admin = true;
$page_button_help  = false;
include ROOT_PATH .'/pages/partials/header.php';

?>

<div id="wrapper">
    <form method="post" accept-charset="utf-8">
        <div class="input-wrapper">
            <input type="text" name="preset" id="preset" autocomplete="off" autocapitalize="none" required>
            <label for="preset">Public key</label>
        </div>
        <input type="submit" value="Search preset">
        <img src="<?php print ROOT_URL ?>/assets/images/logo.svg" alt="Nikagi" class="logo">
    </form>
</div>

<?php

include ROOT_PATH .'/pages/partials/footer.php';

?>