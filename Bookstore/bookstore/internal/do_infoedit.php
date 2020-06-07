<?php

$sql = "update customer set Fname=?,Lname=?,Address=?,Phone=? where ID=?";

if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param("sssii", $_REQUEST['fname'],$_REQUEST['lname'],
			$_REQUEST['address'],  $_REQUEST['phone'], $_REQUEST['cid']);
	$r = $stmt->execute();
	if(! $r) {
		print "Λάθος στην ενημέρωση";
	} else {
		print "OK, Ενημερώθηκε";
	}
}

?>