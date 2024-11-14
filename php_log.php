<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se os dados do formulário foram enviados
if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Caminho para o script Python
    $python_script = 'teste.py';  // Caminho para o seu script Python

    // Comando para chamar o Python no servidor
    $python_command = 'python ' . escapeshellarg($python_script) . ' ' . escapeshellarg($usuario) . ' ' . escapeshellarg($senha);

    // Chama o script Python com os parâmetros via shell_exec
    $output = shell_exec($python_command);

    // Verifique se a variável $output não é null antes de aplicar trim ou htmlspecialchars
    if ($output !== null) {
        // Verifique se a resposta do Python é "SUCCESS"
        if (trim($output) === "SUCCESS") {
            // Redireciona para a página de sucesso
            header("Location: success_log/success.php?login=success");
            exit(); // Sempre use exit após header() para garantir que o código pare de ser executado
        } else {
            // Se a resposta for um erro, exibe uma mensagem
            echo "Erro no login: " . htmlspecialchars(trim($output));
        }
    } else {
        // Se não houver saída do script Python, exibe um erro
        echo "Erro: Nenhuma resposta recebida do script Python.";
    }
} else {
    echo "Usuário e senha não informados.";
}
?>
