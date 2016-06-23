<?php

include "options.php";

$bill = array();
$totalPrice = 0;

//We check if there is the right number of options chosen.
if (sizeof($_POST['size']) != 1 OR sizeof($_POST['condiments']) != constant('condimentsPerPizza')) {
	fail("condiments");
}

//We check if the email is valid
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	fail("email");
}


//We check if the options the customer has chosen still exists and has the same price
foreach($_POST['condiments'] as $hash => $selected) {
	foreach($condiments as $name => $price) {
		if ( $hash == hash('md5', "$name,$price") ) {
			array_push($bill, [$name, $price]);
			$totalPrice += $price;		
		}
	}
}

foreach($_POST['size'] as $hash => $selected) {
	foreach($pizzaSizes as $size => $price) {
		if ( $hash == hash('md5', "$size,$price") ) {
			array_push($bill, [$size, $price]);
			$totalPrice += $price;		
		}
	}
}

//We check if we caught all the condiments 
//plus one elem for the pizza itself
if (sizeof($_POST['condiments']) + 1 != sizeof($bill)) {
	fail("refresh");
}


//We log the transation
$commande = fopen("commandes.txt", "a") or die("Erreur dans la prise de commande"); 
fwrite($commande, "\n" . json_encode($bill));
fclose($commande);


//We send the email
$to      = 'vincent@cloutier.co';
$subject = 'pizza';
$message = "Le prix de la pizza est $totalPrice";
$headers = 'From: test@ipfs.pics' . "\r\n" .
    'Reply-To: test@ipfs.pics' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);





header("Location: success.php");






function fail ($error) {
	header("Location: index.php?error=$error");
	error_log($error);
	die($error);
}
