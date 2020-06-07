Proccessing login.....


<?php
	
	$u = $_REQUEST['username'];
	$p = $_REQUEST['pass'];
	
	$sql='SELECT uname,passwd,Fname,ID FROM customer';
	$res=$mysqli->query($sql);
	
	$flag=true;
	
	while ($result= mysqli_fetch_assoc($res) ) {
		$u1=$result['uname'];
		$p1=$result['passwd'];
		$fn =$result['Fname'];
		$id = $result['ID'];
		if($u==$u1 && $p==$p1){
			print "Συνδεθήκατε!!!";
			print "Καλώς όρισες $fn";
		
			if($id == 1){
				$_SESSION['username'] = 'admin';
				$_SESSION['id'] = $id;
				header('location: index.php');
			}
			else{
				$_SESSION['username'] = 'user';
				$_SESSION['id'] = $id;
				header('location: index.php');
			}
			
			$flag=false;
			break;
		}
	}

	if($flag){
		print "Invalid username or password";
	}
    
?>