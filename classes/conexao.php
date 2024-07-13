<?php
class conexao
{
    public $pdo;
    public $erro;
    public $bdnome = "olx";
    public $bdhost = "localhost";
    public $bdpass = "";
    public $bduser = "root";

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:dbname=".$this->bdnome.";host=".$this->bdhost,$this->bduser,$this->bdpass);
        } catch (PDOexception $e) {
            $this->erro = $e->getMessage();
        }
    }
}
?>