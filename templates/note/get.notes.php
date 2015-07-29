<?php 

require '/templates/db/db.conf.php';

$res = $db->query("SELECT * FROM notes");
$result = array();

while ($row = $res->fetch_assoc()) {
	array_push($result, $row);
}
print_r(json_encode($result));


?>