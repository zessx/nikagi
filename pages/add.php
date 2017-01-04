<?php

if (!isset($_SESSION['logged'])) {
    header('location:'. ROOT_URL .'/?login');
    die;
}

if (isset($_POST['length']) && isset($_POST['public_key'])) {
    $presetsFile = ROOT_PATH . '/config/presets.ini';
    $presets = parse_ini_file($presetsFile, true);
    $presets[$_POST['public_key']] = array(
        'length'     => $_POST['length'],
        'lowercases' => isset($_POST['lowercases']) ? "1" : "0",
        'uppercases' => isset($_POST['uppercases']) ? "1" : "0",
        'digits'     => isset($_POST['digits']) ? "1" : "0",
        'symbols'    => isset($_POST['symbols']) ? "1" : "0"
    );
    ksort($presets);
    writeINI($presets, $presetsFile, true);

    header('location:'. ROOT_URL .'/?admin');
    die;
}

$page_title = '2Keys - Administration';
$page_class = 'admin';
$page_button_back = true;
include ROOT_PATH .'/pages/partials/header.php';

?>

<form action="<?php print ROOT_URL ?>/?add" method="post" accept-charset="utf-8">
    <div class="input-wrapper">
        <label for="length">Use </label>
        <input type="number" name="length" id="length" min="4" max="32" autocomplete="off" value="16">
        <label for="length"> characters</label>
    </div>
    <div class="input-wrapper">
        <input type="checkbox" name="lowercases" id="lowercases" value="1" checked>
        <label for="lowercases">with lowercases</label>
    </div>
    <div class="input-wrapper">
        <input type="checkbox" name="uppercases" id="uppercases" value="1" checked>
        <label for="uppercases">with uppercases</label>
    </div>
    <div class="input-wrapper">
        <input type="checkbox" name="digits" id="digits" value="1" checked>
        <label for="digits">with digits</label>
    </div>
    <div class="input-wrapper">
        <input type="checkbox" name="symbols" id="symbols" value="1" checked>
        <label for="symbols">with symbols</label>
    </div>
    <div class="input-wrapper">
        <input type="text" name="public_key" id="public_key" autocomplete="off" autocapitalize="none" required >
        <label for="public_key">Public key</label>
    </div>
    <input type="submit" value="Create preset">
    <img src="<?php print ROOT_URL ?>/assets/images/logo.svg" alt="2Keys" class="logo">
</form>

<?php

include ROOT_PATH .'/pages/partials/footer.php';

?>