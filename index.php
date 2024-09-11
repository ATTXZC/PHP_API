<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Cadastre-se</title>
</head>
<body>
    <div class="form-container">
        <h1>Formulário de Cadastro</h1>
        <?php
        if (isset($_SESSION['erros'])) {
            echo '<div class="alert">';
            foreach ($_SESSION['erros'] as $erro) {
                echo "<p>$erro</p>";
            }
            echo '</div>';
            unset($_SESSION['erros']);
        }
        ?>
        <form action="project01.php" method="post">
            <div class="form-group">
                <label for="nome">Nome Completo:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="data-nascimento">Data de Nascimento:</label>
                <input type="date" id="data-nascimento" name="data-nascimento" required>
            </div>
            <div class="form-group">
                <label for="genero">Gênero:</label>
                <select id="genero" name="genero" required>
                    <option value="" disabled selected>Selecione...</option>
                    <option value="Masculino">Masculino</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Todes">Todes</option>
                    <option value="Não Tem">Não Tem</option>
                    <option value="Geladeira Eletrolux">Geladeira Eletrolux</option>
                    <option value="Desafiante">Desafiante</option>
                    <option value="Desafiante">outros</option>
                </select>
            </div>
            <div class="form-group">
                <label for="biografia">Biografia:</label>
                <textarea id="biografia" name="biografia"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</body>
</html>
