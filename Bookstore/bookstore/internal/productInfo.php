<form action='' method='post'>
<input type='hidden' name='p' value='add_cart'/>
<table>

<?php
$id = $_REQUEST['id'];
$sql = "select * from product where id=?";


if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param("i", $id);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		
		print "<tr><th>$row[Title]</th></tr>";
		print "<tr><td>$row[Description]</td></tr>";
		print "<tr><td><input type='number' name='posotita' value='1'/></td></tr>";
		print "<tr><input type='hidden' name='prod_id' value='{$row['ID']}'/></tr>";
		print "<tr><td><input type='submit' name='submit' value='Προσθήκη'></td></tr>";
		print "";
		
	}

}
?>
</td>
</tr>
</table>
</form>
