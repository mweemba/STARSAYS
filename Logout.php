<?php
 include 'includes/sessions.php';
 //include 'actions/log.php';
 $message=$dbuser." has logged out";
// create_log($message);
unset($_SESSION["user_id_wel"]);
if(!isset($_SESSION["user_id_wel"])){
echo '<script>window.location = "index.php";</script>';	
}else {
	echo "failed logout";
}
?>