<table >
<tr height=30></tr>

<?php

require "dbconnect.php";
$metritisvivliwn=1;
$tmp['Orders'] =array();
$i=0;
print "<ol>";
$sql = "SELECT * FROM orders";
if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		$sql2 = "SELECT * FROM customer where ID=$row[Customer]";
		if($stmt2 = $mysqli->prepare($sql2)){
			$stmt2->execute();
			$result2 = $stmt2->get_result();
			while($row2 = $result2->fetch_assoc()){ 
				$sql3 = "SELECT * FROM orderdetails where Orders=$row[ID]";
				if($stmt3 = $mysqli->prepare($sql3)){
					$stmt3->execute();
					$result3 = $stmt3->get_result();
					$i=1;
					while($row3 = $result3->fetch_assoc()){
						if($row3['Orders']!=$tmp['Orders']){
							print "<li>OrderID:$row[ID],Date:$row[oDate],Customer:$row2[Fname] $row2[Lname]</li>";
						}
						$tmp['Orders']=$row3['Orders'];
						print "<ul style='list-style: none'>";
						$sql4 = "SELECT * FROM product where ID=$row3[Product]";
						if($stmt4 = $mysqli->prepare($sql4)){
							$stmt4->execute();
							$result4 = $stmt4->get_result();
							while($row4 = $result4->fetch_assoc()){
								print "<li>$i.$row4[Title]</li>";
								$i++;
							}
						}
						print "</ul>";	
					}
				}
			}
		}			
	}
}

print "</ol>";
?>	
</table>