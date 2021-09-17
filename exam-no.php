

<?php

	session_start();
	$userID = $_SESSION["usersId"];
	$userType = $_SESSION["status"];

	if(!empty($userID) && $userType == "student") {

		require_once('menu/header.php'); 
        require_once('menu/student-menu.php'); 
        require_once('templates/exam-no.php');
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

