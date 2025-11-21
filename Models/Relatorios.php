<?php

class Relatorios extends Model
{

    private $data = array();

    public function selecionarProdutos()
    {
        $sql = $this->db->query("SELECT * FROM vendas_itens");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function nomeProdutos()
    {
        $sql = $this->db->query("SELECT SUM(vdi.quantidade) as qtd, p.nome_produto FROM produtos AS p INNER JOIN vendas_itens AS vdi ON vdi.id_produto = p.id GROUP BY(p.nome_produto)");
        // $sql = $this->db->query("SELECT * FROM produtos");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function countCtg()
    {
        $sql = $this->db->query("SELECT c.nome_categoria AS nomeCatg, COUNT(*) AS total_itens FROM vendas_itens AS vi JOIN produtos AS p ON p.id = vi.id_produto 
        JOIN categorias_produtos AS c ON c.id_categoria = p.id GROUP BY c.nome_categoria");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function countVendas()
    {
        $sql = $this->db->query("SELECT COUNT(*) AS total_vendas FROM vendas");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}
