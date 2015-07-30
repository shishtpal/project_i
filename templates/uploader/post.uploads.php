<?php 

require '/templates/db/db.conf.php';

$data = array();
// print_r($_FILES['files']);

if(isset($_SESSION['email']) && isset($_SESSION['userid']) && isset($_SESSION['group']) && $_SESSION['email'] != "" && $_SESSION['userid'] != "" && $_SESSION['group'] != "")
{  
    $error = false;
    $files = array();

    $uploaddir = 'img/uploads/';
    $array_of_filenames = $_FILES['files']['name'];
    $array_of_tempfilenames = $_FILES['files']['tmp_name'];
    $array_of_typesoffiless = $_FILES['files']['type'];
    $array_of_errors = $_FILES['files']['error'];
    $array_of_filesizes = $_FILES['files']['size'];
    $nooffiles = count($array_of_filenames);

    for ($i=0; $i < $nooffiles; $i++) { 
        // Validate Size of Image File Server Side :TODO
        // Send a request to Server to update list of Image Files Uploaded By any User :TODO
        $filename = basename($array_of_filenames[$i]);
    	$gen_filename = $uploaddir .  md5(time() + rand()) . "__" . $filename ;
    	if (move_uploaded_file($array_of_tempfilenames[$i], $gen_filename)) {
    		$files[$i] = $gen_filename;
            $db->query("INSERT INTO `upImage` (`userid`, `ImageTitle`, `ImagePath`, `uploadedAt`) VALUES ('" . $_SESSION['userid'] . "', '" . $filename . "', '" . $gen_filename . "', '" . time() . "')");
    	} else {
    		$error = true;
    	}
    }

    // $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
    echo json_encode($files);
} else {
    echo "false";
}


?>