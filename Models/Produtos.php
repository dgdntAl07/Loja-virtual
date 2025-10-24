<?php

class Produtos extends Model
{
    private $produtoInfo;
    private $permissions;



    public function hasPermission($name)
    {
        return $this->permissions->hasPermission($name);
    }

    // Adicionar produtos 
    public function adicionarProdutos($nome_produto, $descricao, $quantidade, $preco, $categoria, $situacao)
    {
        $sql = $this->db->prepare("INSERT INTO produtos SET nome_produto = :nome, descricao = :descricao, quantidade = :quantidade, preco = :preco, situacao = :situacao, categoria = :categoria");
        $sql->bindValue(":nome", $nome_produto);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":quantidade", $quantidade);
        $sql->bindValue(":preco", $preco);
        $sql->bindValue(":situacao", $situacao);
        $sql->bindValue(":categoria", $categoria);
        $sql->execute();

        return True;
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

    // Atualizar/Editar produtos
    // public function atualizarProdutos($nome_produto_edit, $descricao_edit, $quantidade_edit, $categoria_edit, $preco_edit, $situacao_edit, $id)
    // {
    //     if ($this->existeProdutos($id)) {
    //         $sql = $this->db->prepare("UPDATE produtos SET nome_produto = :nome_produto, 
    //         descricao = :descricao, quantidade = :quantidade, preco = :preco, 
    //         categoria = :categoria, situacao = :situacao WHERE id = :id");
    //         $sql->bindValue(":nome_produto", $nome_produto_edit);
    //         $sql->bindValue(":descricao", $descricao_edit);
    //         $sql->bindValue(":quantidade", $quantidade_edit);
    //         $sql->bindValue(":preco", $preco_edit);
    //         $sql->bindValue(":categoria", $categoria_edit);
    //         $sql->bindValue(":situacao", $situacao_edit);
    //         $sql->bindValue(":id", $id);
    //         $sql->execute();

    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

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
    public function situacaoProduto($situacao, $id)
    {
        $sql = $this->db->prepare("UPDATE produtos SET situacao = :situacao WHERE id = :id");
        $sql->bindValue(':situacao', $situacao);
        $sql->bindValue(':id', $id);
        $sql->execute();

        return true;
    }

}