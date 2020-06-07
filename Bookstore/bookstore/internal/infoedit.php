<form action="index.php" method="post">
<input type="hidden" name="p" value="do_infoedit"/>
<table>
<?php
$cid = $_SESSION['id'];
$sql = "select * from customer where ID=?";

if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param("i", $cid);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
			print "<tr><td>Όνομα:</td><td><input name='fname' value='$row[Fname]'/></td></tr>";
			print "<tr><td>Επίθετο:</td><td><input name='lname' value='$row[Lname]'/></td></tr>";
			print "<tr><td>Διέυθυνση:</td><td><input name='address' value='$row[Address]'/></td></tr>";
			print "<tr><td>Phone:</td><td><input name='phone' value='$row[Phone]'/></td></tr>";
			
	  	    print "<input type='hidden' name='cid' value='$row[ID]'/>";
	  	}
	  }



?>
</table>
<input type="submit" value="Αποθηκευση"/>
</form>