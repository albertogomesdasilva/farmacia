<?php
include 'header.php';
?>
<div class="container">
<main>
      <h1>Login</h1>
      <form method="post" action="">
            <label for="email">Email:</label>
            <input type="email" name="email" required><br><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Login">
      </form>
      <a href="register.php">Registrar</a>
      
</body>
</html>

<?php
include 'database.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // Prepara a declaração SQL
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindValue(':email', $email);

        // Executa a declaração
        $stmt->execute();
        

        // Verifica se o usuário existe
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            ?>
                    <div class="alert alert-danger" role="alert">
                        Usuário não encontrado!
                    </div>
                <?php

            // Verifica se a senha está correta
            if (password_verify($password, $row['password'])) {
                echo "Login bem-sucedido!";
                // Redireciona para a página de index
                // Cria a sessão

                echo $row['id'];
                print_r($row);
                echo $row['name'];

               

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];

                header("Location: ./lista.php");
            } else {
                ?>
                    <div class="alert alert-danger" role="alert">
                        Senha incorreta!
                    </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Usuário não encontrado !
            </div>
            <?php
        }
    } catch (PDOException $e) {
        ?> <div class="alert alert-danger" role="alert"> <?php
            echo "Erro: " . $e->getMessage();
        ?> </div> <?php
    }

    // Fecha a conexão
    $conn = null;
}
?>
</div>
</main>