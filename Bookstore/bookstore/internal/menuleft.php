<h2 align="center">Κατηγορίες</h2>

<?php

$sql = 'select * from category order by Name' ;

if (! ($res = $mysqli->query($sql))) {
 echo "Table creation failed: (" . 
 			$mysqli->errno . ") " . $mysqli->error;
} else {
	while ($row = $res->fetch_assoc()){
		echo "<li align='center'><a href='index.php?p=catinfo&catid=$row[ID]'> $row[Name] </a></li> ";
		
	}
}
?>