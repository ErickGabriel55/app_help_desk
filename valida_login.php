<?php
session_start();

// Simulação de banco de dados
$usuarios_app = array(
    array('email' => 'adm@teste.com.br', 'senha' => '123456'),
    array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
);

$usuario_autenticado = false;

// Verifica se os dados foram enviados
if(isset($_POST['email']) && isset($_POST['senha'])) {
    
    foreach($usuarios_app as $user) {
        // Verifica se o usuário existe no "banco de dados"
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            break; // Para o loop quando encontrar o usuário
        }
    }
    
    if($usuario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['email'] = $_POST['email'];
        header('Location: home.php');
        exit(); // Importante: sempre usar exit() após header redirect
    } else {
        $_SESSION['autenticado'] = 'NAO';
        header('Location: index.php?login=erro');
        exit();
    }
    
} else {
    // Se não houver POST, redireciona para o login
    header('Location: index.php');
    exit();
}
?>