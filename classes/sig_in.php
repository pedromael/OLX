<?php
class sig_in extends conexao{
    public function __construct(){
        parent::__construct();
    }
    public function registrar_login() {
        $id_user = $_SESSION['id_user'];
        $IP = $_SERVER["REMOTE_ADDR"];
        $sql = $this->pdo->prepare("SELECT * FROM login WHERE id_user = $id_user AND IP = '$IP'");
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $sql = $this->pdo->prepare("UPDATE login SET logado=1,data=NOW() WHERE id_user = $id_user AND IP = '$IP'");
            if ($sql->execute()) {
                return true;
            }
        }else {
            $sql = $this->pdo->prepare("INSERT INTO login(id_user,logado,IP,data) VALUES($id_user,1,'$IP',NOW())");
            if ($sql->execute()) {
                return true;
            }
        }
        return false;
    }
    public function logar($dados)
    {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email =:e AND senha =:s");
        $sql->bindValue(":s", md5($senha));
        $sql->bindValue(":e", $email);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetch();

            $_SESSION['id_user'] = $dados['id_user'];
            if ($this->registrar_login()) {
                return true;
            }else {
            $_SESSION['id_user'] = NULL;
            return false;
            }
        } else {
            return false;
        }
    }
    public function cadastrar($nome,$email,$pais,$senha)
    {
        require "../gerador_username.php";
        $code_nome = gerar_code_nome($nome);

        $sqll = $this->pdo->prepare("SELECT * FROM usuarios WHERE email =:e");
        $sqll->bindValue(":e", $email);
        $sqll->execute();
        if ($sqll->rowCount() <= 0) {
            $sql = $this->pdo->prepare("INSERT INTO usuarios(nome,email,indereco,username,data_nascimento,data_registro) 
            VALUES (:n,:e,:i,:u,:d,now())");
            $sql->bindValue(":n", $nome);
            $sql->bindValue(":i", $indereco);
            $sql->bindValue(":e", $email);
            $sql->bindValue(":d", $data_nascimento);
            $sql->bindValue(":u", $code_nome);
            if ($sql->execute()) {
                $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email =:e AND senha=:s");
                $sql->bindValue(":s", md5($senha));
                $sql->bindValue(":e", $email);
                if ($sql->execute()) {
                    $dados = $sql->fetch();

                    $_SESSION['id_user'] = $dados['id_user'];
                    if ($this->registrar_login()) {
                        return true;
                    }else {
                        ?><script>alert("conta resgistrada com sucesso")</script><?php
                    }

                    if ($sql->execute()) {
                        return true;
                    }
                }else {
                    return false;
                }              
            } else {
                return false;
            }
        }
        return false;
    }
}
?>