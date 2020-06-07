<h1>Η παραγγελία σας καταχωρήθηκε επιτυχώς</h1>
<?php
$sql ="INSERT INTO `orders`( `Customer`, `oDate`) VALUES (?,now())";

	$cid = $_SESSION['id'];
	if( $stmt = $mysqli->prepare($sql) ) {
		$stmt->bind_param("i", $cid);
		$stmt->execute();
		$result = $stmt->get_result();
		print "Είσαι καλούλης :)";
	}
?>