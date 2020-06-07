<table>
<th>Τίτλος</th>
<th>Τιμή</th>
<?php

	$sql = "select * from product order by Title" ;
	echo "<ol>";
	if (! ($res = $mysqli->query($sql))) {
	 echo "Table creation failed: (" . 
				$mysqli->errno . ") " . $mysqli->error;
	} else{
		while ($row = $res->fetch_assoc()){
			print "<tr><td><li><a href='?p=productInfo&id=$row[ID]'> $row[Title] </a></li></td>".
				"<td> $row[Price] </td></tr>";
		}
	}
	echo "</ol>";
?>

</table>