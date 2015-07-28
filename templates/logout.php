<?php 

require '/templates/db/db.conf.php';


if ( isset($_SESSION['email']) and isset($_SESSION['userid']) and isset($_SESSION['loginid']) and isset($_SESSION['group']) and isset($_SESSION['fullname']) and isset($_SESSION['status']) and isset($_SESSION['createdAt']) and isset($_SESSION['timeAtLogin'])) {
	$timeAtLogout = time();
	// Send a UPDATE request to server to update timeAtLogin
	$db->query("UPDATE `loginhistory` SET `timeAtLogout`='" . $timeAtLogout . "' WHERE `loginid`=" . $_SESSION['loginid']);
	$db->query("UPDATE `identity` SET `status`=0 WHERE `Id`=" . $_SESSION['userid']);
	unset($_SESSION['email']);
	unset($_SESSION['userid']);
	unset($_SESSION['loginid']);
	unset($_SESSION['group']);
	unset($_SESSION['fullname']);
	unset($_SESSION['status']);
	unset($_SESSION['createdAt']);
	unset($_SESSION['timeAtLogin']);

}


?>