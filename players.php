<?php
include("inc/config.php");

?>

<table border="0">
  <tr>
      <td><?php echo $Str_onlinepl; ?></td>
      <td><?php echo PlayersOnline(); ?></td>
  </tr>
</table>

<?php
	function PlayersOnline() {
		Global $S_Host, $DB_Username,$DB_Password,$DB_Database; 
		$Con = mysqli_connect($S_Host, $DB_Username, $DB_Password,$DB_Database ) or die(mysqli_error($Con));
		mysqli_select_db($Con,$DB_Database);
		$query = "SELECT COUNT(*) as total FROM `char` WHERE online = '1'";
		$result = mysqli_query($Con,$query);
		mysqli_close($Con);
		$arrey = mysqli_fetch_array($result);
		$P_online = $arrey["total"];
		return $P_online;
	}
?>
