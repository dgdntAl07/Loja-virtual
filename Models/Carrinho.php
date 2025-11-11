<?php

class Carrinho extends Model
{
    public function buscarPorId($id)
    {
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    ## Finalizar compra ##

    public function registrarVenda($total)
    {
        $sql = $this->db->prepare("INSERT INTO vendas (total) VALUES (:total)");
        $sql->bindValue(":total", $total);
        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function registrarItem($id_venda, $id_produto, $quantidade, $preco)
    {
        $sql = $this->db->prepare("INSERT INTO vendas_itens (id_venda, id_produto, quantidade, preco) 
        VALUES (:id_venda, :id_produto, :quantidade, :preco)");
        $sql->bindValue(":id_venda", $id_venda);
        $sql->bindValue(":id_produto", $id_produto);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->execute();

        return true;
    }


}