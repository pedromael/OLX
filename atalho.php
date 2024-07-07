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
?>