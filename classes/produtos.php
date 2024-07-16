<?php
    class produtos extends conexao
    {
        public function cadastrar($dados)
        {
            $sql = $this->pdo->prepare("INSERT INTO produtos (id_user,nome,id_categoria,data_registro) 
            VALUES (:u,:n,:c,NOW())");
            $sql->bindvalue(":u", $SESSION['user']);
            $sql->bindvalue(":n", $dados['nome']);
            $sql->bindvalue(":c", $dados['id_categoria']);
            if ($sql->execute()) {
                $sql = $this->pdo->prepare("INSERT INTO preco_produtos (id_produto,valor) VALUES (:id,:valor)");
                $sql->bindvalue(":id", $this->pdo->LastInsertId());
                $sql->bindvalue(":valor", $dados['preco']);
                if (!$sql->execute())
                    $this->eliminar($this->pdo->LastInsertId());
                return true;
            }
            return false;
        }    
        public function eliminar($id_produto)
        {
            $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id_produto = :id");
            $sql->bindvalue(":id", $id_produto);
            if ($sql->execute())
                return true;
            return false
        }
    }
    
?>