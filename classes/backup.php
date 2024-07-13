<?php
class backup extends conexao
{
    public function __construct()
    {
        parent::__construct();
    }
    public function realizar()
    {
        $backupDir = '../backup/';

        $backupFile = $backupDir . 'backup_'.date("Y-m-d_H-i-s").'.sql'; // nome completo do arquivo de backup
        $command = "mysqldump --opt -h {$this->bdhost} -u {$this->bduser} -p {$this->bdpass} {$this->bdnome} > {$backupFile}";

        system($command, $output);

        if ($output === 0) {
            echo "Backup do banco de dados realizado com sucesso para o arquivo: {$backupFile}";
        } else {
            echo "Ocorreu um erro ao fazer o backup do banco de dados.";
        }

    }
}

?>