<?php
session_start();
function autoloader($class) {
    $indereco = __DIR__.'/classes/'.str_replace('\\','/',$class).".php";
    if (file_exists($indereco)) {
        require $indereco;
    }else {
        $indereco = __DIR__.'/classes/'.str_replace('\\','/',$class).".php";
        if (file_exists($indereco)) {
            require $indereco;
        }
    }
}
spl_autoload_register('autoloader');
function sair($para = NULL) {
    if($para == 'login')
    {
        if (file_exists(__DIR__."/entrar/index.php")) {
            echo "saiu";//header("location: ". __DIR__."/entrar/index.php");
        }else {
            if (file_exists(__DIR__."../entrar/index.php")) {
                //header("location: ".__DIR__."/entrar/index.php");
            }
        }
        return true;
    }
    return false;
}
$usuario = new usuario;
?>