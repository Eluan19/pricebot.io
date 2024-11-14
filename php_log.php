<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verifica se os dados do formulário foram enviados
if (isset($_POST['usuario']) && isset($_POST['senha'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Caminho para o Python
    $python_executable = 'C:\\Users\\eluan.lima\\AppData\\Local\\Programs\\Python\\Python311\\python.exe';
    $python_script = 'C:\\xampp\\htdocs\\api_sankhya\\teste.py';  // Caminho para o seu script Python

    // Chama o script Python com os parâmetros via shell_exec
    $output = shell_exec("\"$python_executable\" \"$python_script\" \"$usuario\" \"$senha\"");

    // Verifica se a resposta do Python é "SUCCESS"
    if (trim($output) === "SUCCESS") {
        // Redireciona para a página de sucesso (exemplo: dashboard.php)
        header("Location: sucess_log/sucess.php?login=success");
        exit(); // Sempre use exit após header() para garantir que o código pare de ser executado
    } else {
        // Se a resposta for um erro, exibe uma mensagem
        echo "Erro no login: " . $output;
    }
} else {
    echo "Usuário e senha não informados.";
}
?>
