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

?>
<SCRIPT LANGUAGE="JavaScript" SRC="selectbox.js"></SCRIPT>
<script language="javascript">
    function selectAll(sel, selectIt) {
        for (i = 0; i < sel.length; i++) {
            sel.options[i].selected = selectIt;
        }
    }
</script>
<style>
    .selectbox2 {
        width: 200;
    }
</style>
<?php
$SKIP_DATABASES = ['databasename']; // don't check these databases

$databasesres = $GLOBALS['xoopsDB']->queryF('show databases'); // Get database list
?>
<form action="commit.php" method="POST">
    <h4>Common Table Selection</h4>
    <table border="0" cellpadding="0" style="border-collapse: collapse" width="460" id="table1">
        <tr>
            <td width="153">
                <p align="center">
                    <select name="list1" multiple size="10" class="selectbox2" onDblClick="moveSelectedOptions(this.form['list1'],this.form['list2[]'])">
                        <?php

                        while (false !== ($dar = $GLOBALS['xoopsDB']->fetchBoth($databasesres))) { // Cycle through database list
                            $dbname = $dar[0];

                            if (!DB_in_array($SKIP_DATABASES, $dbname)) { // If database name is not in skip array, process it
                                mysqli_select_db($GLOBALS['xoopsDB']->conn, $dbname); // Switch to the database

                                $tablesres = $GLOBALS['xoopsDB']->queryF('show tables'); // Get a list of tables
                                while (false !== ($tar = $GLOBALS['xoopsDB']->fetchBoth($tablesres))) { // Cycle through the list of tables and echo them
                                    $tablename = $tar[0];

                                    if (preg_match('/' . $xoopsDB->prefix() . '_/i', $tablename)) { // Check if table belongs to this install
                                        // *shrugs* Do nothing?
                                    } else { // Else display it
                                        $sql = 'SELECT * FROM ' . $xoopsDB->prefix . '_common_tables';

                                        $result = $GLOBALS['xoopsDB']->queryF($sql);

                                        while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($result))) {
                                            $CommonTables[] = $row['tablename'];
                                        }

                                        $key = array_search($tablename, $CommonTables, true);

                                        if (false !== $key) {
                                        } else {
                                            DB_screen_display(DB_print_sp('<option value="' . $tablename . '">' . $tablename . '</option>', 50, ' ')); //echo the table name
                                        }
                                    }

                                    flush();
                                }
                            }
                        }
                        ?>
                    </select>
                </p>
            </td>
            <td width="153">
                <p align="center">
                    <input type="button" name="right" value="&gt;&gt;" oNClick="moveSelectedOptions(this.form['list1'],this.form['list2[]'])">
                </p>
                <p align="center">
                    <input type="button" name="left" value="&lt;&lt;" onClick="moveSelectedOptions(this.form['list2[]'],this.form['list1'])">
                </p>
            </td>
            <td width="154">
                <p align="center">
                    <select name="list2[]" multiple size="10" class="selectbox2" onDblClick="moveSelectedOptions(this.form['list2[]'],this.form['list1'])">
                        <?php
                        $sql = 'SELECT * FROM ' . $xoopsDB->prefix() . '_common_tables';
                        $result = $GLOBALS['xoopsDB']->queryF($sql);
                        while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($result))) {
                            $tables2 = $row['tablename'];

                            DB_screen_display(DB_print_sp('<option value="' . $tables2 . '">' . $tables2 . '</option>', 50, ' '));
                        }
                        ?>
                    </select>
                </p>
            </td>
        </tr>
        <tr>
            <td width="153">
                &nbsp;
            </td>
            <td width="153">
                &nbsp;<p><input type="submit" value="Submit" name="Submit" onclick="selectAll(this.form['list2[]'], true);"></td>
            <td width="154">
                &nbsp;
            </td>
        </tr>
    </table>
</form>
<?php

function DB_screen_display($string)
{
    echo $string;
}

function DB_in_array($array, $value)
{
    $found = 0;

    for ($i = 0, $iMax = count($array); $i < $iMax; $i++) {
        if ($array[$i] == $value) {
            $found = 1;

            break;
        }
    }

    return $found;
}

function DB_print_sp($str, $len, $delim = ' ')
{
    $res = $str;

    for ($i = mb_strlen($str); $i < $len; $i++) {
        $res .= $delim;
    }

    return $res;
}

?>
