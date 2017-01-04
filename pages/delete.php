<?php

if (!isset($_SESSION['logged'])) {
    header('location:'. ROOT_URL .'/?login');
    die;
}

if (isset($_POST['key'])) {
    $presetsFile = ROOT_PATH . '/config/presets.ini';
    $presets = parse_ini_file($presetsFile, true);
    unset($presets[$_POST['key']]);
    ksort($presets);
    writeINI($presets, $presetsFile, true);
}

header('location:'. ROOT_URL .'/?admin');
die;