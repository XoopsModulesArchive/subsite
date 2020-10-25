<?php

/*
+--------------------------------------------------------------------------
|    _________    ___.          .__  __
|   /   _____/__ _\_ |__   _____|__|/  |_  ____
|   \_____  \|  |  \ __ \ /  ___/  \   __\/ __ \
|   /        \  |  / \_\ \\___ \|  ||  | \  ___/
|  /_______  /____/|___  /____  >__||__|  \___  >
|          \/          \/     \/              \/
|     _____             .___    .__
|    /     \   ____   __| _/_ __|  |   ____
|   /  \ /  \ /  _ \ / __ |  |  \  | _/ __ \
|  /    Y    (  <_> ) /_/ |  |  /  |_\  ___/
|  \____|__  /\____/\____ |____/|____/\___  >
|          \/            \/      BETA 1.0 \/
|   ========================================
|   by Trent Scholl aka BoDGie
|   http://www.virtuepark.com
|   ========================================
|   Web: http://www.virtuepark.com
|   Time: Sun, 18 Apr 2004 15:29:18 GMT+10
|   Email: trent.scholl@strent.net
|   MSN: strent2@hotmail.com
|   IRC: irc.virtuepark.com
+---------------------------------------------------------------------------
*/
require dirname(__DIR__, 3) . '/include/cp_header.php';
require dirname(__DIR__, 3) . '/mainfile.php';
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include '../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include '../language/english/main.php';
}

xoops_cp_header();

?>
    <h4>Database Configuration
    <h4>
    <table border="0" cellpadding="0" style="border-collapse: collapse" width="300" id="table1">
        <tr>
            <td>Server</td>
            <td><input readonly type="text" name="Server" value="<?php echo XOOPS_DB_HOST; ?>" size="20"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input readonly type="text" name="Username" value="<?php echo XOOPS_DB_USER; ?>" size="20"></td>
        </tr>
        <tr>
            <td>
                <p style="margin-top: 0; margin-bottom: 0">Password</td>
            <td><input readonly type="password" name="Password" value="<?php echo XOOPS_DB_PASS; ?>" size="20"></td>
        </tr>
        <tr>
            <td>Database Name</td>
            <td><input readonly type="text" name="DatabaseName" value="<?php echo XOOPS_DB_NAME; ?>" size="20"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">
                <p align="center"><input type="submit" value="Submit" name="B1"></td>
        </tr>
    </table>

<?php
xoops_cp_footer();
?>
