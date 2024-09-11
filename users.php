<?php
include "db_guigas.php"; // Incluir o arquivo de conexão

$sql = "SELECT ID_User, nome, email, data_nascimento, genero, biografia FROM Form";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários Cadastrados</title>
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <div class="results-container">
        <h1>Usuários Cadastrados</h1>
        
        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Data de Nascimento</th>
                        <th>Gênero</th>
                        <th>Biografia</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['ID_User']); ?></td>
                            <td><?php echo htmlspecialchars($row['nome']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['data_nascimento']); ?></td>
                            <td><?php echo htmlspecialchars($row['genero']); ?></td>
                            <td><?php echo htmlspecialchars($row['biografia']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Não há usuários cadastrados.</p>
        <?php endif; ?>

        <p><a href="index.php">Voltar ao formulário</a></p>
    </div>

    <?php
    $conn->close();
    ?>
</body>
</html>
