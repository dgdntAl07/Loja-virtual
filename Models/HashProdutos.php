<?php

class HashProdutos extends Model
{
    /**
     * Cria e adiciona um hash único para o produto
     */
    public function addHashProduto($id_produto, $hash)
    {
        $sql = $this->db->prepare("INSERT INTO hash_produtos (id_produto, hash) VALUES (:id_produto, :hash)");
        $sql->bindValue(':id_produto', $id_produto);
        $sql->bindValue(':hash', $hash);
        $sql->execute();
    }

    /**
     * Verifica se o hash existe
     */
    public function verifyHash($hash)
    {
        $sql = $this->db->prepare("SELECT * FROM hash_produtos WHERE hash = :hash");
        $sql->bindValue(':hash', $hash);
        $sql->execute();

        return ($sql->rowCount() > 0);
    }

    /**
     * Busca o produto pelo hash
     */
    public function getProdutoByHash($hash)
    {
        $sql = $this->db->prepare("
            SELECT p.* FROM produtos p
            INNER JOIN hash_produtos h ON h.id_produto = p.id
            WHERE h.hash = :hash
        ");
        $sql->bindValue(':hash', $hash);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }
}
