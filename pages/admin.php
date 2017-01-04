<?php

if (!isset($_SESSION['logged'])) {
    header('location:'. ROOT_URL .'/?login');
    die;
}

$page_title = '2Keys - Administration';
$page_class = 'admin';
$page_button_back = true;
$page_button_admin = false;
include ROOT_PATH .'/pages/partials/header.php';

?>

<table>
    <thead>
        <tr>
            <th>Public key</th>
            <th>Length</th>
            <th>Lowercase</th>
            <th>Uppercase</th>
            <th>Digit</th>
            <th>Symbol</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php

        $presets = parse_ini_file(ROOT_PATH . '/config/presets.ini', true);
        if (count($presets) > 0) {
            foreach ($presets as $key => $params) {
                print '<tr>';
                    print '<td>'. $key .'</td>';
                    print '<td>'. $params['length'] .'</td>';
                    print '<td>'. ($params['lowercases'] ? '☑' : '<span class="disabled">☐</span>') .'</td>';
                    print '<td>'. ($params['uppercases'] ? '☑' : '<span class="disabled">☐</span>') .'</td>';
                    print '<td>'. ($params['digits'] ? '☑' : '<span class="disabled">☐</span>') .'</td>';
                    print '<td>'. ($params['symbols'] ? '☑' : '<span class="disabled">☐</span>') .'</td>';
                    print '<td><form action="/?delete" method="post"><button type="submit" name="key" value="'. $key .'" class="link-delete" title="Delete"><img src="assets/images/delete.svg" alt="Delete"></button></form></td>';
                print '</tr>';
            }
        } else {
            print '<tr><td colspan="7"><span class="disabled">--- No presets ---</span></td></tr>';
        }

        ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="6">&nbsp;</th>
            <th><a href="<?php print ROOT_URL ?>/?add" class="link-add" title="Add"><img src="assets/images/add.svg" alt="Add"></a></th>
        </tr>
        <tr>
            <th colspan="7"><img src="<?php print ROOT_URL ?>/assets/images/logo.svg" alt="2Keys" class="logo"></th>
        </tr>
    </tfoot>
</table>

<?php

include ROOT_PATH .'/pages/partials/footer.php';

?>