<?php

include_once '../abstract/Abstrata.php';
include_once '../iCRUD/iCRUD.php';

class Foto extends Abstrata implements iCRUD {
    //CRIANDO OS ATRUBUTOS
    private $id;
    private $nome;
    private $foto;
    
    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }
    function getFoto() {
        return $this->foto;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

        
        
    public function alterar() {
        
    }

    public function cadastrar() {
        $pdo = parent::getDB();
        
        try {
            $cadastrar = $pdo->prepare("INSERT INTO foto(nome, foto) VALUES(?,?)");
            $cadastrar->bindParam(1, $this->getNome());
            $cadastrar->bindParam(2, $this->getFoto());
            $cadastrar->execute();
            if ($cadastrar->rowCount() == 1):
                    return true;
                else:
                    $this->setErro("Erro ao cadastrar cliente !");
                endif;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            
        }
            
    }
    
    public function deletar() {
        parent::deletar();
    }
    
    public function listar() {
        parent::$tabela = "foto";
        return parent::listar();
    }

    
}