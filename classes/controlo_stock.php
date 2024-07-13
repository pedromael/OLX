<?php
class controlo_stock extends conexao
{
    private function controlo_stock($dados)
    {
        $sql = $this->pdo->prepare("INSERT INTO stock_produtos(id_produto,caso,qtd) VALUES (:id,:caso,:qtd)");
        $sql->bindvalue(":id", $dados['id_produto']);
        $sql->bindvalue(":caso", $dados['caso']);
        $sql->bindvalue(":qtd", $dados['qtd']);
        if(!$sql->bindvalue())
            return false;
        return true;
    }
    public function adicionar($dados)
    {
        $dados['caso'] = "mais";
        if($this->controlo_stock($dados))
            return true;
        return false;
    }
    public function reduzir($dados)
    {
        $dados['caso'] = "menos";
        if($this->controlo_stock($dados))
            return true;
        return false;
    }
}

?>