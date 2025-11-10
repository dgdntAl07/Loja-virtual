<?php

class Vendas extends Model{
    
    public function registrarVenda($total){
        $sql = $this->db->prepare("INSERT INTO vendas (total) VALUES (:total)");
        $sql->bindValue(":total", $total);
        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function registrarItem($id_venda, $id_produto, $quantidade, $preco){
        $sql = $this->db->prepare("INSERT INTO vendas_itens (id_venda, id_produto, quantidade, preco) 
        VALUES (:id_venda, :id_produto, :quantidade, :preco)");
        $sql->bindValue(":id_venda", $id_venda);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->execute();

        return true;
    }

    public function pegarVendas(){
        $sql = $this->db->query("SELECT * FROM vendas");

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}