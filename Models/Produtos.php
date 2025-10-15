<?php

class Produtos extends Model
{

    private $permissions;

    public function hasPermission($name)
    {
        if (in_array($name, $this->permissions)) {
            return true;
        } else {
            return false;
        }
    }
    // Adicionar produtos 
    public function adicionarProdutos($nome_produto, $descricao, $quantidade, $preco, $categoria)
    {
        $sql = $this->db->prepare("INSERT INTO products SET nome = :nome, descricao = :descricao, quantidade = :quantidade, preco = :preco, categoria = :categoria, situacao = '1'");
        $sql->bindValue(":name", $nome_produto);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":categoria", $categoria);
        $sql->bindValue(":categoria", $categoria);
        $sql->execute();

        return $this->db->lastInsertId();
    }

    // Ler produtos
    public function getInfo($id)
    {
        $sql = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetch();
        } else {
            return array();
        }
    }

    public function getAll()
    {
        $sql = $this->db->query("SELECT * FROM produtos");

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll();
        } else {
            return array();
        }
    }

    // Atualizar produtos
    public function atualizarProdutos($nome_produto, $descricao, $quantidade, $preco, $categoria, $id)
    {
        if($this->existeProdutos($id) == false) {
            $sql = $this->db->prepare("UPDATE produtos SET nome_produto = :nome_produto, descricao = :descricao, quantidade = :quantidade, preco = :preco, categoria = :categoria WHERE id = :id");
            $sql->bindValue(":name", $nome_produto);
            $sql->bindValue(":descricao", $descricao);
            $sql->bindValue(":quantidade", $quantidade);
            $sql->bindValue(":preco", $preco);
            $sql->bindValue(":categoria", $categoria);
            $sql->execute();

            return true;
        } else {
            return false;
        }
    }

    private function existeProdutos($id)
    {
        $sql = $this->db->prepare('SELECT * FROM contatos WHERE id = :id');
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
        $sql = 'DELETE FROM contatos WHERE id = :id';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}