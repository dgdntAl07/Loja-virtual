<?php

class Produtos extends Model
{

    private $permissions;

    public function hasPermission($name)
    {
        return $this->permissions->hasPermission($name);
    }

    // Adicionar produtos 
    public function adicionarProdutos($nome_produto, $descricao, $quantidade, $preco, $categoria, $upload)
    {
        try {
            $sql = $this->db->prepare("
            INSERT INTO produtos (nome_produto, descricao, quantidade, preco, categoria, imagens)
            VALUES (:nome, :descricao, :quantidade, :preco, :categoria, :upload)
        ");

            $sql->bindValue(":nome", $nome_produto);
            $sql->bindValue(":descricao", $descricao);
            $sql->bindValue(":quantidade", $quantidade);
            $sql->bindValue(":preco", $preco);
            $sql->bindValue(":categoria", $categoria);
            $sql->bindValue(":upload", $upload);

            $ret = $sql->execute();
            var_dump($ret, $this->db->lastInsertId());
            return $ret;
        } catch (PDOException $e) {
            echo "Erro SQL: " . $e->getMessage();
            return false;
        }
    }

    // Ler produtos
    public function getAll()
    {
        $sql = $this->db->query("SELECT * FROM produtos WHERE situacao = '1'");

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function atualizarProdutos($id, $dados)
    {

        if ($this->existeProdutos($id)) {

            if (empty($dados)) {
                return false;
            }

            $set = [];
            foreach ($dados as $campo => $valor) {
                $set[] = "$campo = :$campo";
            }

            $sql = "UPDATE produtos SET " . implode(', ', $set) . " WHERE id = :id";
            $stmt = $this->db->prepare($sql);

            foreach ($dados as $campo => $valor) {
                $stmt->bindValue(":$campo", $valor);
            }

            $stmt->bindValue(":id", $id);
            $stmt->execute();

            return true;
        } else {
            return false;
        }
    }

    private function existeProdutos($id)
    {
        $sql = $this->db->prepare('SELECT * FROM produtos WHERE id = :id');
        $sql->bindValue(':id', $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Deletar produtos
    public function excluirPeloID($id)
    {
        $sql = 'DELETE FROM produtos WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }

    // Atualiza a situação (ativo/inativo) de um produto
    public function atualizarSituacaoProduto($id)
    {
        $sql = "UPDATE produtos SET situacao = '0' WHERE id = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function situacaoProduto()
    {
        $sql = $this->db->query("SELECT * FROM produtos WHERE situacao = '0'");

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    public function atualizarSituacaoLixeira($id, $dados = [])
    {
        if (empty($dados))
            return false;

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

    public function getId()
    {
        $sql = $this->db->query("SELECT id FROM produtos ORDER BY id DESC LIMIT 1");

        if ($sql->rowCount() > 0) {
            // Retorna como array associativo
            return $sql->fetch(PDO::FETCH_ASSOC);
        } else {
            return ['id' => 0];
        }
    }

    public function delProduto(){
        $sql = $this->db->prepare("");
    }
}
