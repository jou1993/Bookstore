<h1>Καλάθι αγορών</h1>

<?php

$sql = "select * from product where id=?";
if(! isset($_SESSION['cart']) || ! is_array($_SESSION['cart'])) {
	print "Το καλάθι είναι άδειο";
} elseif( $stmt = $mysqli->prepare($sql) ) {
	$sum=0;
	print <<<END
		<table >
		<tr>
		<th>Τίτλος</th>
		<th>|  Τιμή</th>
		<th>|  Τεμάχια</th>
		<th>|  Συνολική Τιμή</th>
		</tr>
END;
	foreach($_SESSION['cart'] as $k=>$v) {
		$stmt->bind_param("i", $k);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$result->free_result();
		print "<tr><td>$row[Title]</td>";
		print "<td>|  $row[Price]</td>";
		print "<td id='prod_$k'>|  $v</td>";
		$price=$row['Price']* $v;
		$sum += $price;
		print "<td id='price_$k'>|  $price</td>";
		
		print "</tr>";
	}
	print "<tr><th colspan='3'>Συνολο</th><th>$sum</th></tr>";

	print <<<END
	<table>
	<form action='' method='get'>
	<input type='hidden' name='p' value='empty_cart'/>	
	<input type='submit' name='submit' value='Αδειασμα καλαθιου'>
	</form>	
	<form action='' method='get'>
	<input type='hidden' name='p' value='buy'/>	
	<input type='submit' name='submit' value='Αγορα'>
	</form>	
	</table>
END;
}

?>


</table>