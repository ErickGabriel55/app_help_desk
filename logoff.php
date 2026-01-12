<?php 
    session_start();
    /*
    Para fazer o logoff podemos fazer removendo os índices do array da sessão com unset() que serve para remover índices de qualquer array. A unset só remove o índice se ele existir.
    
    Ou podemos destruir a variável de sessão com session_destroy() que é específica para a função sesssion(). a session_destroy
    */
    session_destroy();
    header('Location: index.php');
?>