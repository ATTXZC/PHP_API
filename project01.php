<?php
include "db_guigas.php"; // Inclua o arquivo de conexão

function nomeValido($nome) {
    $nomes = explode(' ', $nome);
    return count($nomes) >= 2;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $data_nascimento = trim($_POST['data-nascimento']);
    $genero = trim($_POST['genero']);
    $biografia = trim($_POST['biografia']);

    // Exibir valor recebido para depuração
    echo "Valor recebido para gênero: " . htmlspecialchars($genero) . "<br>";

    $erros = [];

    if (empty($nome) || empty($email) || empty($data_nascimento) || empty($genero)) {
        $erros[] = "Por favor, preencha todos os campos obrigatórios.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O e-mail fornecido não é válido.";
    }

    if (!nomeValido($nome)) {
        $erros[] = "O nome deve conter pelo menos dois nomes.";
    }

    if (count($erros) > 0) {
        foreach ($erros as $erro) {
            echo "<script>alert('$erro');</script>";
        }
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        // Verifique se o valor de gênero está correto
        $generoValores = ["Masculino", "Feminino", "Todes", "Não Tem", "Geladeira Eletrolux", "Desafiante","outros"];
        if (!in_array($genero, $generoValores)) {
            die("Erro: Valor de gênero inválido.");
        }

        // Certifique-se de que a conexão ainda está aberta antes de usá-la
        if ($conn) {
            // Inserir os dados no banco de dados
            $sql = "INSERT INTO Form (nome, email, data_nascimento, genero, biografia) VALUES (?, ?, ?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sssss", $nome, $email, $data_nascimento, $genero, $biografia);
                $stmt->execute();
                $stmt->close();

                // Redirecionar para a página de resultados
                echo "<script>window.location.href = 'users.php';</script>";
            } else {
                die("Erro ao preparar a declaração: " . $conn->error);
            }
        } else {
            die("Erro: Conexão com o banco de dados não está disponível.");
        }
    }
}

// Fechar a conexão ao final
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}
?>
