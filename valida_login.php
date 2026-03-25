<?php
    session_start();

    // Simulação de banco d  e dados
    $usuarios_app = array(
        array('id' => 1,'email' => 'adm@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 2,'email' => 'user@teste.com.br', 'senha' => '1234', 'perfil_id' => 1),
        array('id' => 3,'email' => 'jose@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
        array('id' => 4,'email' => 'maria@teste.com.br', 'senha' => '1234', 'perfil_id' => 2),
);

    $usuario_autenticado = false;
    $usuario_id = null;
    $usuario_perfil_id = null;
    $perfis = array(1 => 'Administrativo', 2 => 'Ussuário');

// Verifica se os dados foram enviados
if(isset($_POST['email']) && isset($_POST['senha'])) {
    
    foreach($usuarios_app as $user) {
        // Verifica se o usuário existe no "banco de dados"
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
            break; // Para o loop quando encontrar o usuário
        }
    }
    
    if($usuario_autenticado) {
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
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