<?php echo "1442442146<br />";?>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="16%" class="text_header">&nbsp;</td>
        <td width="16%" class="text_header">Kill Info</td>
        <td width="17%" class="text_header center_txt">Current Time (EST)</td>
        <td width="17%" class="text_header center_txt"><?php echo date('m-d-Y H:i:s', time()); ?></td>
        <td width="20%" class="text_header center_txt">Windows Open In</td>
        <td width="14%" class="text_header center_txt">Window Closes In</td>
    </tr>
    <tr>
        <td width="16%" class="text_header">Target</td>
        <td width="16%" class="text_header">Death (EST)</td>
        <td width="17%" class="text_header">Window Opens (EST)</td>
        <td width="17%" class="text_header">Window Closes (EST)</td>
        <td width="20%" class="text_header">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="33%" class="text_header">Days</td>
                    <td width="33%" class="text_header">Hours</td>
                    <td width="33%" class="text_header">Minutes</td>
                </tr>
            </table>
        </td>
        <td width="14%" class="text_header">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="50%" class="text_header">Hours</td>
                    <td width="50%" class="text_header">Minutes</td>
                </tr>
            </table>
        </td>
    </tr>
<?php

function diff_time($diff_timestamp1, $diff_timestamp2) {

    $diff_seconds  = $diff_timestamp1 - $diff_timestamp2;
    $diff_weeks    = floor($diff_seconds/604800);
    $diff_seconds -= $diff_weeks   * 604800;
    $diff_days     = floor($diff_seconds/86400);
    $diff_seconds -= $diff_days    * 86400;
    $diff_hours    = floor($diff_seconds/3600);
    $diff_seconds -= $diff_hours   * 3600;
    $diff_minutes  = floor($diff_seconds/60);
    $diff_seconds -= $diff_minutes * 60;

    return array('d' => $diff_days, 'h' => $diff_hours, 'm' => $diff_minutes);
}    
	date_default_timezone_set('America/New_York');
                $mobWinOpen = "+ 24 hours";
                $mobWinClose = "+ 44 hours";
        $winopen = strtotime($mobWinOpen, 1442442146);
        $winclose = strtotime($mobWinClose, 1442442146);
        $open_time  = diff_time(time(), $winopen);
        $close_time = diff_time(time(), $winclose);
        ?>        
        <tr>
            <td width="16%" class="text_normal"><?php echo "test"; ?></td>
            <td width="16%" class="text_normal"><?php echo date('m-d-Y H:i:s', 1442442146); ?></td>
            <td width="17%" class="text_normal"><?php echo date('m-d-Y H:i:s', $winopen); ?></td>
            <td width="17%" class="text_normal"><?php echo date('m-d-Y H:i:s', $winclose); ?></td>
            <td width="20%" class="text_normal">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
<?php
                        if ($winopen > $winclose) {
                            ?>
                            <td width="33%" class="text_normal">
                                <?php
                                if ($open_time["d"] > 0) {
                                    echo $open_time["d"];
                                } else {
                                    echo "0";
                                }
                                ?>
                            </td>
                            <td width="33%" class="text_normal">
                                <?php
                                if (($open_time["h"] < 86400) && ($open_time["h"] > 0)) {
                                    echo $open_time["h"];
                                } elseif (($open_time["h"] < 0) || ($open_time["h"] % 86400) < 0 || ($open_time["h"] === 0)) {
                                    echo "0";
                                } elseif ($open_time["h"] > 86400) {
                                    echo $open_time["h"] % 86400;
                                }
                                ?>
                            </td>
                            <td width="33%" class="text_normal">
                                <?php
                                if (($open_time["m"] < 60) && ($open_time["m"] > 0)) {
                                    echo $open_time["m"];
                                } else if (($open_time["m"] < 0) || ($open_time["m"] % 60 < 0) || ($open_time["m"] === 0)) {
                                    echo "0";
                                } else if ($open_time["m"] > 60) {
                                    echo $open_time["m"] % 60;
                                }
                                ?>
                            </td>
                        <?php
                        } else {
                            ?>
                            <td width="33%" class="text_normal">0</td>
                            <td width="33%" class="text_normal">0</td>
                            <td width="33%" class="text_normal">0</td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
            <td width="14%" class="text_normal">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <?php
                        if (($winclose > time()) && ($winopen < time())) {
                            ?>
                            <td width="50%" class="text_normal">
                                <?php
                                if (($close_time["h"] < 86400) && ($close_time["h"] > 0)) {
                                    echo $close_time["h"];
                                } elseif (($close_time["h"] < 0) || ($close_time["h"] % 86400) < 0 || ($close_time["h"] === 0)) {
                                    echo "0";
                                } elseif ($close_time["h"] > 86400) {
                                    echo $close_time["h"] % 86400;
                                }
                                ?>
                            </td>
                            <td width="50%" class="text_normal">
                                <?php
                                if (($close_time["m"] < 60) && ($close_time["m"] > 0)) {
                                    echo $close_time["m"];
                                } else if (($close_time["m"] < 0) || ($close_time["m"] % 60 < 0) || ($close_time["m"] === 0)) {
                                    echo "0";
                                } else if ($close_time["m"] > 60) {
                                    echo $close_time["m"] % 60;
                                }
                                ?>
                            </td>
                        <?php
                        } else {
                            ?>
                            <td width="50%" class="text_normal">0</td>
                            <td width="50%" class="text_normal">0</td>
                        <?php
                        }
                        ?>
                    </tr>
                </table>
            </td>
        </tr>
</table>