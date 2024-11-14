<?php
// Verifica se o login foi bem-sucedido
if (isset($_GET['login']) && $_GET['login'] == 'success') {
    echo "<h1>Login Bem-Sucedido!</h1>";
    echo "<p>Bem-vindo ao seu painel!</p>";
} else {
    echo "<h1>Acesso Negado</h1>";
    echo "<p>Você não está autenticado.</p>";
}
?>
