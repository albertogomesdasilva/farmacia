<?php
include 'header.php';
?>
<div class="container mt-5">
    <main>
        <h1 class="mb-4">Login</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <a href="register.php" class="btn btn-link mt-3">Registrar</a>
    </main>
</div>

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

            // Verifica se a senha está correta
            if (password_verify($password, $row['password'])) {
                echo '<div class="alert alert-success" role="alert">Login bem-sucedido!</div>';
                
                // Cria a sessão
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['name'];

                // Redireciona para a página de index
                header("Location: ./lista.php");
            } else {
                echo '<div class="alert alert-danger" role="alert">Senha incorreta!</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Usuário não encontrado!</div>';
        }
    } catch (PDOException $e) {
        echo '<div class="alert alert-danger" role="alert">Erro: ' . $e->getMessage() . '</div>';
    }

    // Fecha a conexão
    $conn = null;
}
?>
