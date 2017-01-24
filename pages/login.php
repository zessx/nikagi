<?php

$username = null;
if (isset($_POST['username']) && ADMIN_USERNAME == $_POST['username']) {
    $username = $_POST['username'];

    if (isset($_POST['password']) && ADMIN_PASSWORD == hash('sha256', '#//' . $_POST['password'])) {
        $_SESSION['logged'] = 1;
        header('location:'. ROOT_URL .'/?admin');
        die;
    }
}

$page_title = 'Nikagi - Administration';
$page_class = 'admin';
$page_button_back  = true;
$page_button_admin = false;
include ROOT_PATH .'/pages/partials/header.php';

?>

<form action="<?php print ROOT_URL ?>/?login" method="post" accept-charset="utf-8">
    <div class="input-wrapper">
        <input type="text" name="username" id="username" required value="<?php print $username ?>">
        <label for="username">Username</label>
    </div>
    <div class="input-wrapper">
        <input type="password" name="password" id="password" autocomplete="off" autocapitalize="none" required>
        <label for="password">Password</label>
    </div>
    <input type="submit" value="Login">
    <img src="<?php print ROOT_URL ?>/assets/images/logo.svg" alt="Nikagi" class="logo">
</form>

<?php

include ROOT_PATH .'/pages/partials/footer.php';

?>