<?php 


require '/templates/db/db.conf.php';

/*
Pass username and password to thus file using jQuery.post method.
This PHP script return you data, 
  either TRUE
  or
  FALSE

login=clicked&email=some@where.com&password=1234

email
userid
group

"signup=clicked&fname=" + s_firstname + "&lname=" + s_lastname + "&email=" + s_email + "&phone" + s_phone + "&password=" + s_pass,

*/



if (array_key_exists('login', $_POST) and array_key_exists('email', $_POST) and array_key_exists('password', $_POST)){
  if ($_POST['login'] == 'clicked' and $_POST['email'] != "" and $_POST['password'] != "" ) {

$loginQuery =<<<"EOT"
SELECT Id, Full_name, Email, MobileNo, isRoot, isActive, whichGroup, whoIam, status, createdAt FROM `identity` WHERE Email='$_POST[email]' and password='$_POST[password]'
EOT;

      if ($res = $db->query( $loginQuery )) {
        if ($res->num_rows) {
          $row = $res->fetch_assoc();
          $timeAtLogin = time();
          $_SESSION['email'] = $row['Email'];
          $_SESSION['userid'] = $row['Id'];
          $_SESSION['group'] = $row['whichGroup'];  // user belongs to which group ( root, admin, users)
          $_SESSION['fullname'] = $row['Full_name'];  // fullname of user
          $_SESSION['status'] = $row['status'];  // online or offline
          $_SESSION['createdAt'] = $row['createdAt']; // when did user created this account.
          $_SESSION['timeAtLogin'] = $timeAtLogin;
          $res = $db->query("INSERT INTO `loginHistory` (`loginid`, `userid`, `email`, `whichGroup`, `timeAtLogin`) VALUES ('', '" . $row['Id'] . "', '" . $row['Email'] . "', '" .  $row['whichGroup'] . "', '" . $timeAtLogin . "')");
          echo "true"; 
        } else {
          echo "false";
          // no user record found in database.
        }
      }
  } else {
    echo "false";
    // username | email and password can not be empty
  }
} else if (isset($_POST['signup']) and $_POST['signup'] == 'clicked'){
  if (isset($_POST['fname']) and isset($_POST['lname']) and isset($_POST['email']) and isset($_POST['phone']) and isset($_POST['password']) and $_POST['fname'] != "" and $_POST['lname'] != "" and $_POST['email'] != "" and $_POST['password'] != "") {

$fullname = implode(' ', array($_POST['fname'], $_POST['lname']));
$timestamp = time();
$signupQuery =<<<"EOT"
INSERT INTO `identity` (`Id`, `Full_name`, `Email`, `MobileNo`, `Password`, `isRoot`, `isActive`, `whichGroup`, `whoIam`, `status`, `createdAt`)  VALUES 
('', '$fullname', '$_POST[email]', '$_POST[phone]', '$_POST[password]' , 0 , 1, 'user', '', 1, '$timestamp')
EOT;
    
    $db->query($signupQuery);
    if (!$db->errno) {
      echo "true";
    } else {
      echo "duplicate";
    }

  } else {
    echo "false";
    // You have not submit the form using standard FORM desgned for this API.
  }
}

?>