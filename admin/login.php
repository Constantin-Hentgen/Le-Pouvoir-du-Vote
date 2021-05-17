<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] === true){
    header('Location: index.php');
}

if(isset($_POST['submit'])){
    if(htmlspecialchars($_POST['password']) == "toor" && htmlspecialchars($_POST['login']) == "root"){
        $_SESSION['admin'] = true;
        header('Location: index.php');
    } else {
        exit();
    }
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../style/admin.css">
        <link rel="shortcut icon" href="../resources/pictures/france.ico" />
        
        <title>Administration</title>
    </head>
    <body>
        <form method="post">
            <input type="text" name="login">
            <input type="password" name="password">
            <input type="submit" name="submit">
        </form>
    </body>
</html>