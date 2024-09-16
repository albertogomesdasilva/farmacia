<?php

include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($name == 'Admin') {
        $nivel = 1;
    } else {
        $nivel = 0;
    }

    // Verifica se as senhas coincidem
    if ($password !== $confirm_password) {
        echo "<div class='alert alert-danger'>As senhas não coincidem!</div>";
    } else {
        // Criptografa a senha
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            // Consulta o banco de dados para ver se o email já está em uso
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute(); // Executa a consulta
        
            if ($stmt->rowCount() > 0) {
                echo "<div class='alert alert-danger'>Email já está em uso!</div>";
                exit(); // Encerra o script
            } else {
                // Prepara a declaração SQL para inserir o novo usuário
                $stmt = $conn->prepare("INSERT INTO users (name, email, password, nivel) VALUES (:name, :email, :password, :nivel)");
                $stmt->bindValue(':name', $name);
                $stmt->bindValue(':email', $email);
                $stmt->bindValue(':password', $hashed_password);
                $stmt->bindValue(':nivel', $nivel);
        
                // Executa a declaração
                if ($stmt->execute()) {
                    echo "<div class='alert alert-success'>Registro bem-sucedido!</div>";
                    // Redireciona para a página de login
                    header("Location: login.php");
                    exit(); // Encerra o script após redirecionar
                }
            }
        } catch (PDOException $e) {
            echo "<div class='alert alert-danger'>Erro: " . $e->getMessage() . "</div>";
        }
        
        // Fecha a conexão
        $conn = null;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Registro</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="name">Nome de Usuário:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirme a Senha:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
        <p class="mt-3">Já tem uma conta? <a href="login.php">Faça login aqui</a>.</p>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>