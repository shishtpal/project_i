


<?php 

/*

/images API
returns Real Path to the Image Stored on the Server 
Only When User logined successfully.

*/





require '/templates/db/db.conf.php';

if(isset($_SESSION['email']) && isset($_SESSION['userid']) && isset($_SESSION['group']) && $_SESSION['email'] != "" && $_SESSION['userid'] != "" && $_SESSION['group'] != "")
{  

	// START: images?fields&imageid=2
	if (isset($_GET['fields']) && isset($_GET['imageid'])) {
		$res = $db->query("SELECT * from `upImage` WHERE `imageid`='" . $_GET['imageid'] . "' and userid='" . $_SESSION['userid'] . "'");
		if ($res->num_rows){
			$row = $res->fetch_assoc();
			echo $row['ImagePath'];
		}
	}
	// END: images?fields&imageid=2


}















?>