<?php
class transacao extends controlo_stock
{
    private $pagamento;
    public function __construct()
    {
        parent::__construct();
        $this->pagamento = new pagamento;
    }
}
?>