<?php

class Relatorios extends Model
{

    private $data = array();
    
    public function selecionarProdutos(){
        $sql = $this->db->query("SELECT * FROM vendas_itens");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            return [];
        }
    }

    public function nomeProdutos(){
        $sql = $this->db->query("SELECT SUM(vdi.quantidade) as qtd, p.nome_produto FROM produtos AS p INNER JOIN vendas_itens AS vdi ON vdi.id_produto = p.id GROUP BY(p.nome_produto)");
        // $sql = $this->db->query("SELECT * FROM produtos");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC); 
        } else {
            return [];
        }
    }

}
