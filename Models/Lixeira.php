<?php

class Lixeira extends Model
{

    public function produtosExcluidos()
    {
        $sql = $this->db->query("SELECT p.*, c.nome_categoria FROM produtos AS p INNER JOIN categorias_produtos AS c ON p.id_ctg = c.id_categoria WHERE situacao = '0'");

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function atualizarSituacaoProduto($id)
    {
        $sql = "UPDATE produtos SET situacao = '0' WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function atualizarSituacaoLixeira($id, $dados = [])
    {
        if (empty($dados))
            return false;

        // array dos campos 
        $campos = [];
        foreach ($dados as $chave => $valor) {
            $campos[] = "$chave = :$chave";
        }

        $sql = "UPDATE produtos SET " . implode(', ', $campos) . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        foreach ($dados as $chave => $valor) {
            $stmt->bindValue(":$chave", $valor);
        }

        $stmt->bindValue(":id", $id);
        return $stmt->execute();
    }

    public function deletarProduto($id)
    {
        $sql = $this->db->prepare("DELETE FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

}