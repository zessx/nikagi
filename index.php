<?php

define('ROOT_PATH', dirname(__FILE__));
define('ROOT_URL',  rtrim(dirname($_SERVER['PHP_SELF']), '\\\/'));

ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();

$page_title = '2Keys';
$page_class = '';
$page_button_back  = false;
$page_button_admin = true;
$page_button_help  = true;

$config = parse_ini_file(ROOT_PATH . '/config/config.ini');
if (   !isset($config['username'])   || empty($config['username'])
    || !isset($config['password'])   || empty($config['password'])
    || !isset($config['length'])     || !preg_match('/^\d+$/', $config['length'])
    || !isset($config['lowercases']) || !in_array($config['lowercases'], array("0", "1"))
    || !isset($config['uppercases']) || !in_array($config['uppercases'], array("0", "1"))
    || !isset($config['digits'])     || !in_array($config['digits'], array("0", "1"))
    || !isset($config['symbols'])    || !in_array($config['symbols'], array("0", "1"))
) {

    // Launch 2Keys installation
    include ROOT_PATH . '/pages/install.php';

} else {

    define('ADMIN_USERNAME', $config['username']);
    define('ADMIN_PASSWORD', $config['password']);
    define('DEFAULT_LENGTH',     $config['length']);
    define('DEFAULT_LOWERCASES', (bool)$config['lowercases']);
    define('DEFAULT_UPPERCASES', (bool)$config['uppercases']);
    define('DEFAULT_DIGITS',     (bool)$config['digits']);
    define('DEFAULT_SYMBOLS',    (bool)$config['symbols']);

    if (isset($_GET['admin'])) {
        checkLogin();
        include ROOT_PATH . '/pages/admin.php';

    } elseif (isset($_GET['add'])) {
        checkLogin();
        include ROOT_PATH . '/pages/add.php';

    } elseif (isset($_GET['delete'])) {
        checkLogin();
        include ROOT_PATH . '/pages/delete.php';

    } elseif (isset($_GET['login'])) {
        include ROOT_PATH . '/pages/login.php';

    } else {
        include ROOT_PATH . '/pages/generate.php';
        session_destroy();
    }

}

function checkLogin() {
    if (!isset($_SESSION['logged'])) {
        header('location:'. ROOT_URL .'/?login');
        die;
    }
}

function writeINI($assoc_arr, $path, $has_sections = false) {
    $content = "";
    if ($has_sections) {
        foreach ($assoc_arr as $key=>$elem) {
            $content .= "[".$key."]\n";
            foreach ($elem as $key2=>$elem2) {
                if(is_array($elem2))
                {
                    for($i=0;$i<count($elem2);$i++)
                    {
                        $content .= $key2."[] = \"".$elem2[$i]."\"\n";
                    }
                }
                else if($elem2=="") $content .= $key2." = \n";
                else $content .= $key2." = \"".$elem2."\"\n";
            }
        }
    }
    else {
        foreach ($assoc_arr as $key=>$elem) {
            if(is_array($elem))
            {
                for($i=0;$i<count($elem);$i++)
                {
                    $content .= $key."[] = \"".$elem[$i]."\"\n";
                }
            }
            else if($elem=="") $content .= $key." = \n";
            else $content .= $key." = \"".$elem."\"\n";
        }
    }

    if (!$handle = fopen($path, 'w')) {
        return false;
    }

    $success = fwrite($handle, $content);
    fclose($handle);

    return $success;
}