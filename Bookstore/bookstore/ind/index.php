<!DOCTYPE html>
<html lang="en">
<head>
<?php
session_start();
if( ! isset($_SESSION['username'])) {
	$_SESSION['username']='?';
}
require_once "internal/dbconnect.php";

 ?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>BookStore</title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/css/dashboard.css" rel="stylesheet">
	<script src=".//bootstrap/js/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
	
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Bookstore</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
				<a class="navbar-brand" href="?p=start">Αρχική</a>
				<a class="navbar-brand" href="?p=about">Σχετικά</a>
				<a class="navbar-brand" href="?p=products">Προϊόντα</a>
				<a class="navbar-brand" href="?p=show_cart">Το καλάθι μου</a>
				
				<?php if($_SESSION['username']!='?'){ ?>
				<a class="navbar-brand" href="?p=logout">Έξοδος</a>
				<?php }else{ ?>
				<a class="navbar-brand" href="?p=login">Είσοδος</a>
				<?php } ?>
				
				
          </ul>
        </div>
      </div>
    </nav>
  
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">	
		<?php
			if($_SESSION['username']!='?'){	
				   if($_SESSION['username']=='admin'){
							 print '<h1 align="center">Admin Menu</h1>';  
						   }
					else
						if(isset($_SESSION['username'])){
			         	   	print '<h1 align="center">User Menu</h1>';
						   }
						
					
				
					if($_SESSION['username']=='admin') { 
						print '<li><a href="?p=custdata">Λίστα πελατών</a></li>';
						print '<li><a href="?p=orders">Λίστα παραγγελιών</a></li>';
						print '<li><a href="?p=products">Προϊόντα</a></li>';
						print '<li><a href="?p=logout">Έξοδος</a></li>';
					}
					else{
						print"<li><a href='?p=orders'>Παραγγελίες</a></li>";
						print"<li><a href='?p=custdata'>Στοιχεία Πελάτη</a></li>";
						print '<li><a href="?p=products">Προϊόντα</a></li>';
			            print '<li><a href="?p=logout">Έξοδος</a></li>';		
					}
					
			
			}
		?>
			
		</ul>
			
	<!------Categories Left Menu--------->	
		<ul class="nav nav-sidebar">
	    <?php
		require "internal/menuleft.php";	
	    ?>
            </ul>
          </div>
   
    <!--------                  ---------->
     
	 <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	  <?php
	  if(!isset($_REQUEST['p'])) {
		$_REQUEST['p']='start';
	  }
	  
	  $p=$_REQUEST['p'];
          print "<h1 class=\"page-header\">$_REQUEST[p]</h1>";
          
	switch ($p){
		
		case "start" :		require "internal/start.php";
							break;
							
		case "about":	 	require "internal/shopinfo.php";
							break;
							
		case "login" :		require "internal/login.php";
							break;
							
		case 'do_login':	require "internal/do_login.php";
							break;
					
		case 'catinfo':		require "internal/catinfo.inc";
							break;
					
		case 'prod_info':	require "internal/prod_info.php";
							break;
					
		case 'add_cart':	require "internal/add_cart.php";
							break;
					
		case 'show_cart':	require "internal/show_cart.php";
							break;
							
		case 'products':	require "internal/products.php";
							break;
					
		case 'buy' : 		require "internal/buy.php";
							break;
										
		case 'logout':		require "internal/do_logout.php";
							break;
							
		case 'do_pedit':	require "internal/do_pedit.php";	
							break;
					
		case 'pedit':		require "internal/pedit.php";
							break;
							
    	case 'contact' :	require "internal/contact.php";
							break;
					
		case "do_customer_details" :  require "internal/do_customer_details.php";
							break;
					
        case 'show_orders': require "internal/show_orders.php";
							break;
							 	
        case "shopinfo":  	require "internal/shopinfo.php";
							break;
							
		case "empty_cart":  require "internal/empty_cart.php";
							break;
		default: 
					print "Η σελίδα δεν υπάρχει";
	}
?>          
        </div>
      </div>
    </div>
</body>
</html>