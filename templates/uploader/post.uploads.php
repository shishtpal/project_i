<?php 

$data = array();
// print_r($_FILES['files']);

if(true)
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
    	$filename = $uploaddir .  md5(time() + rand()) . "__" . basename($array_of_filenames[$i]) ;
    	if (move_uploaded_file($array_of_tempfilenames[$i], $filename)) {
    		$files[$i] = $filename;
    	} else {
    		$error = true;
    	}
    }

    // $data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
}

echo json_encode($files);

?>