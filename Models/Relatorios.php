<?php

class Relatorios extends Model
{

    private $data = array();
    
    public function pegarItens(){
        $sql = $this->db->query("SELECT * FROM vendas_itens");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            return [];
        }
    }

    public function selecionarProdutos(){
        
    }

}
