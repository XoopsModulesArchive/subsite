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
if (file_exists('../language/' . $xoopsConfig['language'] . '/main.php')) {
    include '../language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include '../language/english/main.php';
}

xoops_cp_header();

function CommonTables()
{
    global $xoopsDB;

    require __DIR__ . '/gettables.php';
}

switch ($_GET['action']) {
    case 'CommonTables':
        CommonTables();
        break;
    default:
        CommonTables();
}

xoops_cp_footer();

exit();
