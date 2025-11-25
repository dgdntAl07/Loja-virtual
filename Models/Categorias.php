<?php

class Categorias extends Model
{

    public function getCategorias(){
        $sql = $this->db->query("SELECT * FROM categorias_produtos");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    public function pegarNomeCat()
    {
        $sql = $this->db->query("SELECT id_categoria, nome_categoria FROM categorias_produtos");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }

    // Modal de Add Produtos -- Admin
    public function AddCategoria($newCategoria){
        $sql = $this->db->prepare("INSERT INTO categorias_produtos (nome_categoria) VALUES (:newCategoria)");
        $sql->bindValue(":newCategoria", $newCategoria);
        $sql->execute();
        
        if ($sql->rowCount() > 0) {
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return [];
        }
    }
}