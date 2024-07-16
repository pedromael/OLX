<?php
final class pagamento extends conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function realizar_pagamento()
    {
        return true;
    }
}
?>