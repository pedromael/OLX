<?php
    include "atalho.php";
    if (!isset($_SESSION['user'])) {
        header("location: entrar/");//sair('login');
    }
    $bup = new backup;
    $bup->realizar();
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
</head>
<body>
    <nav>
        <h1>Bem Vindo</h1>
    </nav>
</body>
</html>