<?php
header("Refresh:15");
include("inc/config.php");

$Status = ServerStatus();
?>
    <table border="0">
  <tr>
    <td><?php echo $Str_Loginsrv; ?></td>
    <td><?php echo $Status[0]; ?></td>
  </tr>
  <tr>
    <td><?php echo $Str_Charsrv; ?></td>
    <td><?php echo $Status[1]; ?></td>
  </tr>
  <tr>
    <td><?php echo $Str_Mapsrv; ?></td>
    <td><?php echo $Status[2]; ?></td>
  </tr>
</table>

<?php

    function ServerStatus() {
        Global $S_Host, $S_Login, $S_Char, $S_Map, $S_Online, $S_Offline;
        error_reporting(0);
        $Status = array();
        $LoginServer = fsockopen($S_Host, $S_Login, $errno, $errstr, 1);
        $CharServer = fsockopen($S_Host, $S_Char, $errno, $errstr, 1);
        $MapServer = fsockopen($S_Host, $S_Map, $errno, $errstr, 1);
        if(!$LoginServer){ $Status[0] = $S_Offline;  } else { $Status[0] = $S_Online; };
        if(!$CharServer){ $Status[1] = $S_Offline;  } else { $Status[1] = $S_Online; };
        if(!$MapServer){ $Status[2] = $S_Offline;  } else { $Status[2] = $S_Online; };
        return $Status;
    }
	?>