<p>
Έξοδος
</p>

<?php
	
	$_SESSION['username']='?';
	session_destroy();
	$_SESSION = array();
	header('location: index.php');
?>