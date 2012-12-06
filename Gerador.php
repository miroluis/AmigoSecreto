<!DOCTYPE html>

<head>
	<meta charset="UTF-8" />
	<title>Gera Lista de Amigos Scecretos</title>

</head>

	<body>

	<?php

	$myarrayName = $_POST["MemberName"]; // Note that the name does not end with "[]" when retrieving
	$myarrayEmail = $_POST['MemberEmail']; // Note that the name does not end with "[]" when retrieving
	$Mensagem =  	$_POST['Mensagem'];

	//echo "<p>Mensagem ".$Mensagem." </p>";
	
	//conta quantos Amigos há
$totalAmigos = 0;
	for ($i=0; $i < count($myarrayName); $i++) { 
		if (!empty($myarrayName[$i])) {
			$totalAmigos++;
		}
	}

echo "<p>Nome ".$myarrayName[0]." e email " .$myarrayEmail[0]." </p>";

echo "<p>Existem ".count($myarrayName)." linhas, mas só ".$totalAmigos." estão preenchidas</p>";


	//Gera Array com numeração sequencial e depois baralha-o
$arrayBaralhado = range(0, $totalAmigos-1);

//print_r($arrayBaralhado);

$bemBaralhado = false;
while (!$bemBaralhado) {
	$bemBaralhado = true;
	shuffle($arrayBaralhado);

	//echo "<p></p>";

	//print_r($arrayBaralhado);

	//Verifica se a um numero de uma dada posição não lhe foi atribuida a mesma posição
	for ($i=0; $i < count($arrayBaralhado); $i++) { 
		if ($i == $arrayBaralhado[$i]) {
			$bemBaralhado = false;
		}
	}

}

for ($i=0; $i < count($arrayBaralhado); $i++) { 

	 $to = $myarrayEmail[$i];
	 $subject = "Ainda é só um teste Amigo Secreto - A quem vais dar prenda este Natal";
	 $body = $Mensagem."\nEste Natal vais dar prenda a \n\n ".$myarrayName[$arrayBaralhado[$i]];
	
	//echo "<p>Email enviado a ". $to." </p>";

	//echo "<p>Com a seguinte mensagem ".$body." </p>";

	 if (mail($to, $subject, $body)) {
	   echo("<p>Message successfully sent to ".$to." </p>");
	  } else {
	   echo("<p>Message delivery failed to ".$to."</p>");
	  }

}

	?>

	</body>
	</html>