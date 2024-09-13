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
        echo "As senhas não coincidem!";
    } else {
        // Criptografa a senha
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            try {
                // Consulta o banco de dados para ver se o email já está em uso
                $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
                $stmt->bindValue(':email', $email);
                $stmt->execute(); // Executa a consulta
            
                if ($stmt->rowCount() > 0) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    echo 'usuário encontrado' . '<br>';
                    echo "Email já está em uso!";
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
                        echo "Registro bem-sucedido!";
                        // Redireciona para a página de login
                        header("Location: login.php");
                        exit(); // Encerra o script após redirecionar
                    }
                }
            } catch (PDOException $e) {
                echo "Erro: " . $e->getMessage();
            }
            } catch (PDOException $e) {
                  echo "Erro: " . $e->getMessage();
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
</head>
<body>
    <div class="container">

      <h2>Registro</h2>
      <form method="post" action="">
            <label for="name">Nome de Usuário:</label>
            <input type="text"  name="name" required><br><br>
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br><br>
            <label for="confirm_password">Confirme a Senha:</label>
            <input type="password" id="confirm_password" name="confirm_password" required><br><br>
            <input type="submit" value="Registrar">
      </form>
    </div>

</body>
</html>