<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>

<?php
	session_start();
	$cat = null;
	//ini_set('display_errors', '0');
	if( ! isset($_SESSION['username'])) {
		$_SESSION['username']='?';
	}
	require_once "internal/dbconnect.php";
?>


	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	
	<title>Bookstore</title>
	
	<link href="layout.css" rel="stylesheet" type="text/css" />

	<link rel="icon" href="http://getbootstrap.com/favicon.ico">
	<link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="./bootstrap/css/dashboard.css" rel="stylesheet">
	<script src=".//bootstrap/js/jquery.min.js"></script>
	<script src="./bootstrap/js/bootstrap.min.js"></script>

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div id="navbar" class="navbar-collapse collapse">
	<a class="navbar-brand" href="index.php?p=start">Αρχική</a>
	<a class="navbar-brand" href="?p=shopinfo">Κατάστημα</a>
	<a class="navbar-brand" href="?p=products">Προϊόντα</a>
	<a class="navbar-brand" href="?p=login">Login</a>
	<a class="navbar-brand" href="?p=kalath">Καλάθι</a>
	<a class="navbar-brand" href="?p=contact">Επικοινωνία</a>
</div>
</nav>

<div id="left" class="nav nav-sidebar">

<?php
	
	//print "<p>This is user: $_SESSION[username]</p>";
	if($_SESSION['username']=='admin') {
		print "<h2 align='center'>Admin MENU</h2>";
		print "<a href='?p=customers'> Λίστα πελατών</a><br>";
		print "<a href='?p=orders'> Λίστα παραγγελιών</a><br>";
		print "<a href='?p=logout'> Logout</a>";
	}
	else if($_SESSION['username']=='user') {
		print "<h2 align='center'>User MENU</h2>";
		print "<a href='?p=my_orders'> Εμφάνιση παραγγελιών</a><br>";
		print "<a href='?p=my_details'> Στοιχεία πελάτη</a><br>";
		print "<a href='?p=logout'> Logout</a>";
	}
	
	require 'internal/menuleft.php';
	/*
	if( ! isset($_REQUEST['p'])) {
		$_REQUEST['p']='start';
	}
	$p = $_REQUEST['p'];
	if($p == "products" || $p == "productsmenu"){
		require 'internal/menuleft.php';
	}
	*/
?>


</div>

<div id="content">

<?php

	if( ! isset($_REQUEST['p'])) {
		$_REQUEST['p']='start';
	}
	$p = $_REQUEST['p'];
	
	switch ($p){
	case "start" :		require "internal/start.php";
						break;
	case "shopinfo": 	require "internal/shopinfo.php";
						break;
	case "login" :		require "internal/login.php";
						break;
	case 'do_login':	require "internal/do_login.php";
						break;
	case 'products':	require "internal/products.php";
						break;
	case 'basket':		require "internal/kalath.php";
						break;
	case 'contact':		require "internal/contact.php";
						break;
	case 'customers':	require "internal/customers.php";
						break;
	case 'orders':		require "internal/show_all_orders.php";
						break;
	case 'my_orders':	require "internal/orders.php";
						break;
	case 'my_details':	require "internal/infoedit.php";
						break;
	case 'logout':		require "internal/logout.php";
						break;
	case 'catinfo':		require "internal/catinfo.php";
						break;
	case 'productInfo':	require "internal/productInfo.php";
						break;
	case 'add_cart':	require "internal/add_cart.php";
						break;
	case 'kalath':		require "internal/kalath.php";
						break;
	case 'empty_cart':	require "internal/empty_cart.php";
						break;
	case 'buy':			require "internal/buy.php";
						break;
	case 'do_infoedit':	require "internal/do_infoedit.php";
						break;
	default: 
		print "Η σελίδα δεν υπάρχει";
	}
	
?>
</div>

<div id="footer">
	<p>Η σελιδα αυτή δημιουργήθηκε από τον Πετρούση Ανδρέα για το μάθημα της ΑΔΙΣΕ</p>
</div>

</body>
</html>