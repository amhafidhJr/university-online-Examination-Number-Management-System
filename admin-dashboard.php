<?php

	session_start();
	$userID = $_SESSION["usersId"];
	$userType = $_SESSION["status"];

	if(!empty($userID) && $userType == "admin") {

		require_once('menu/header.php'); 
        require_once('menu/menu.php'); 
        require_once('templates/dashboard.php');
        require_once('menu/footer.php');

	}
	elseif (!empty($userID) && $userType == "student") {
        require_once('menu/header.php'); 
        require_once('menu/student-menu.php'); 
        require_once('templates/student-dashboard.php');
        require_once('menu/footer.php');
	}
	else {
		?>
		<script type="text/javascript">
			// window.location.href = "index.php";
		</script>
		<?php
	}
   
?>
