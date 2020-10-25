<?php

$modversion['name'] = 'Subsite Module';
$modversion['version'] = 0.1;
$modversion['author'] = 'Trent Scholl (trent.scholl@strent.net)<br>http://www.virtuepark.com';
$modversion['description'] = 'Module to control common tables between Xoops installations';
$modversion['credits'] = 'The XOOPS Project<br>STReNT<br>Virtue Park';
$modversion['help'] = 'subsite.html';
$modversion['license'] = 'GPL see LICENSE';
$modversion['official'] = 1;
$modversion['image'] = 'images/ssite_slogo.png';
$modversion['dirname'] = 'subsite';

// Admin things
$modversion['hasAdmin'] = 1;
$modversion['adminindex'] = 'admin/index.php';
$modversion['adminmenu'] = 'admin/menu.php';

// Menu
$modversion['hasMain'] = 0;

// Search
$modversion['hasSearch'] = 0;

// Comments
$modversion['hasComments'] = 0;

// SQL
$modversion['sqlfile']['mysql'] = 'sql/mysql.sql';

// Tables created by sql file (without prefix!)
$modversion['tables'][0] = 'common_tables';
