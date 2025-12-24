<?php
    // variavel que verifica se a autenticação foi realizada
    $usuarios_autenticado = false;


    // usuarios do sistmea
    $usuarios_app = array(
        array('email' => 'adm@teste.com.br', 'senha' => '123456'),
        array('email' => 'user@teste.com.br', 'senha' => 'abcd'),
    );

    /*echo '<pre>';
    print_r($usuarios_app);
    echo '</pre>';*/

    foreach($usuarios_app as $user){
       /*echo 'Usuário app: ' . $user['email'] . ' / ' . $user['senha'];
        echo '<br>Usuário form: ' .  $_POST['email'] . '/' . $_POST['senha'];*/

        // Verifica se o usuário existe no "banco de dados" e se ele digitou corretamente as informações
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){ 
            $usuarios_autenticado = true;
        }
        
        /* caso essa variavel seja true exibe a mensagem,  do contrario retorna pra index novamente com uma mensagem de erro*/
        if($usuarios_autenticado){ 
            echo '<br>';
            echo 'Usuario autenticado!';
        }else {
            header('Location: index.php?login=erro');
        }
        echo '<hr>';
    }

    
    // $_POST['senha'];
?>