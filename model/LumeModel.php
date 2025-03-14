<?php

require_once 'config/database.php';

class LumeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function adicionarUsuario($nome, $email, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, email, senha, saldo_creditos) VALUES (?, ?, ?, 0)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nome, $email, $senhaHash]);
    }

    public function buscarUsuarioPorEmail($email) {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listarUsuarios() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function adicionarProduto($id_usuario, $nome, $descricao, $categoria, $imagem, $valor_credito, $status) {
        $sql = "INSERT INTO produtos (id_usuario, nome, descricao, categoria, imagem, valor_credito, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$id_usuario, $nome, $descricao, $categoria, $imagem, $valor_credito, $status]);
    }
}

?>