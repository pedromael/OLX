<?php
class conexao
{
    public $pdo;
    public $erro;
    private $bdnome = "olx";
    private $bdhost = "localhost";
    private $bdpass = "";
    private $bduser = "root";

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