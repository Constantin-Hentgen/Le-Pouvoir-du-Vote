<?php
try{
    $pdo = new PDO('mysql:dbname=le-pouvoir-du-vote_data;host=mysql-le-pouvoir-du-vote.alwaysdata.net', '222883', 'Drutor37');
} catch(Exception $e){
    echo $e;
}

/* TOTAL VISITOR COUNTER */
$checkVisitors_request = $pdo->query('SELECT * FROM visitors WHERE DATE(date) = CURDATE()');

if($checkVisitors_request->rowCount() === 0){

    $addVisitor_request = $pdo->query('INSERT INTO visitors(visitors) VALUES(1)');

} else {

    $dailyVisits = $checkVisitors_request->fetchObject();
	$visitors = $dailyVisits->visitors;
	
    $updateVisitor_request = $pdo->prepare('UPDATE visitors SET visitors = :visitors, date = NOW() WHERE DATE(date) = CURDATE()');
    $updateVisitor_request->execute(
        [
			'visitors' => $visitors += 1
        ]);
}

/* UNIQUE VISITOR COUNTER */ 

    
$isSet = $pdo->prepare('SELECT * FROM unique_visitors WHERE ip = :ip');
$isSet->execute(
    [
        'ip' => $_SERVER['REMOTE_ADDR']
    ]);

if($isSet->rowCount() != 1){
    $setUser = $pdo->prepare('INSERT INTO unique_visitors(ip) VALUES(:ip)');
    $setUser->execute(
        [
            'ip' => $_SERVER['REMOTE_ADDR']
        ]);
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../style/onePage.css">
	<link rel="stylesheet" type="text/css" href="../style/animation.css">
	<link rel="shortcut icon" href="../resources/pictures/france.ico" />
	<link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
	<script src="../engine.js"></script>
	<title>Le Pouvoir du Vote</title>
</head>

<body>
	<div id="mainmenu">
		<a href="../fr/home.html"><img class="icon" src="../resources/pictures/home.png"></a>

		<div id="navigate">
			<a class="navigate" href="fr/history.html">Histoire</a>
			<a class="navigate" href="fr/info.html">Fonctionnement du vote</a>
			<a class="navigate" href="fr/statistics.html">Statistiques</a>
			<a class="navigate" href="fr/survey.html">Enquête</a>
			<a class="navigate" href="fr/about.html">À propos</a>
			<p class="misenligne">mis en ligne le 03/01/2021 | mis à jour le 31/01/2021</p>
		</div>
	</div>

	<div id="languagemenu">
		<a href="../en/home.html"><img class="icon" src="../resources/pictures/british.png"></a>
		<a href="../fr/home.html"><img class="icon" src="../resources/pictures/france.png"></a>
		<a href="../de/home.html"><img class="icon" src="../resources/pictures/germany.png"></a>
		<a href="../es/home.html"><img class="icon" src="../resources/pictures/spain.png"></a>
		<a href="../tr/home.html"><img class="icon" src="../resources/pictures/turkey.png"></a>
<!--
			<a href="../ar/home.html"><img class="icon" src="../resources/pictures/arabia.png"></a>
			<a href="../tr/home.html"><img class="icon" src="../resources/pictures/turkey.png"></a>
			<a href="../cn/home.html"><img class="icon" src="../resources/pictures/china.png"></a>
-->
	</div>

	<h1 id="title">
		<span class="blue">LE P</span>OUV<span class="red">OIR</span>
		<br>
		<span class="blue">DU </span>VO<span class="red">TE</span>
	</h1>

<!--
	<h1 id="title"> 1000 visits !!!</h1>

	<audio autoplay loop >
		<source src="../resources/audio/bonjour.mp3" type="audio/mpeg">
	</audio>
-->

	<button id="languages" onclick="hideforlanguages()">
		<img class="icon" src="../resources/pictures/lang.png">
	</button>

	<button id="menu" onclick="hideformenu()">
		<img class="icon" src="../resources/pictures/menue.png">
	</button>
</body>

</html>