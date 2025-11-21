<?php

class Vendas extends Model
{

    public function pegarVendas()
    {
        $sql = $this->db->query("SELECT * FROM vendas");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function pegarItens($id_venda)
    {
        $sql = $this->db->prepare("SELECT vdi.*,p.nome_produto FROM vendas_itens AS vdi INNER JOIN produtos AS p ON p.id = vdi.id_produto WHERE id_venda = :id_venda");
        $sql->bindValue(":id_venda", $id_venda);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function deletarVenda($id)
    {
        // Deleta os itens da venda
        $sql = $this->db->prepare("DELETE FROM vendas_itens WHERE id_venda = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        // Deleta a venda
        $sql = $this->db->prepare("DELETE FROM vendas WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }
}