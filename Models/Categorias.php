<?php

Class Categorias extends Model {
    public function pegarNomeCat(){
    $sql = $this->db->query("SELECT id_categoria, nome_categoria FROM categorias_produtos");
    $sql->execute();

    if ($sql->rowCount() > 0){
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}
}