<?php

class Vendas extends Model{

    public function pegarVendas(){
        $sql = $this->db->query("SELECT * FROM vendas");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function pegarItens($id_venda){
        $sql = $this->db->prepare("SELECT * FROM vendas_itens WHERE id_venda = :id_venda");
        $sql->bindValue(":id_venda", $id_venda);
        $sql->execute();

        if($sql->rowCount() > 0){
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } 
    }

}