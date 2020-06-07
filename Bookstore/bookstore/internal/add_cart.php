<?php
if(! isset($_SESSION['cart']) || ! is_array($_SESSION['cart'])) {
	$_SESSION['cart']=array();
}

$p = $_REQUEST['prod_id'];
$a = $_REQUEST['posotita'];


$cart = &$_SESSION['cart'];
$cart[$p] += $a;

print "Προστέθηκαν $a τεμάχια στο καλάθι σας";

?>
