<?php
session_start();

if($_SESSION['admin'] != true){
    header('Location: login.php');
} 

try{
    $pdo = new PDO('mysql:dbname=le-pouvoir-du-vote_data;host=mysql-le-pouvoir-du-vote.alwaysdata.net', '222883', 'Drutor37');
} catch(Exception $e){
    echo $e;
}

function visits($pdo){
    $sum = 0;
    $visits = $pdo->query('SELECT * FROM visitors');
    $data = $visits->fetchAll();

    foreach($data as $row){
        $sum += $row['visitors'];
    }
    return $sum;
}


function visitors($pdo){
    $base_value = 55;

    $unique_visits = $pdo->query('SELECT * FROM unique_visitors');
    return $unique_visits->rowCount() + $base_value;

}

function ratio($pdo){
    return round(visits($pdo)/visitors($pdo), 1);
}

?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../style/admin.css">
        <link rel="shortcut icon" href="../resources/pictures/france.ico" />
        
        <title>Administration</title>

    </head>
    <body>
        <div id="main">
            <div class="stats">Visites: <?=visits($pdo)?> </div>
            <div class="stats">Visiteurs: <?=visitors($pdo)?> </div>
            <div class="stats">Ratio: <?=ratio($pdo)?> </div>
        </div>
    </body>
</html>