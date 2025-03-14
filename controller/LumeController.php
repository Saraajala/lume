<?php

require_once 'config/database.php';
require_once 'LumeModel.php';

class LumeController {
    private $model;

    public function __construct($pdo) {
        $this->model = new LumeModel($pdo);
    }

    public function cadastrarUsuario($nome, $email, $senha) {
        if ($this->model->adicionarUsuario($nome, $email, $senha)) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário.";
        }
    }

    public function login($email, $senha) {
        $usuario = $this->model->buscarUsuarioPorEmail($email);
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            session_start();
            $_SESSION['usuario_id'] = $usuario['id_usuario'];
            $_SESSION['nome_usuario'] = $usuario['nome'];
            echo "Login realizado com sucesso!";
        } else {
            echo "E-mail ou senha incorretos!";
        }
    }

    public function listarUsuarios() {
        return $this->model->listarUsuarios();
    }

    public function adicionarProduto($id_usuario, $nome, $descricao, $categoria, $imagem, $valor_credito, $status) {
        if ($this->model->adicionarProduto($id_usuario, $nome, $descricao, $categoria, $imagem, $valor_credito, $status)) {
            echo "Produto adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar produto.";
        }
    }
}

?>

