<?php
include 'header.php';
session_start();

if (!isset($_SESSION['user_id'])) {
      header("Location: ./login.php");
}
?>
           <div class="container">
      <div class="row">
            <div class="col">
            <h1>Detalhes </h1>
            </br>
            </br>
            </div>
            <div class="col">
            <?php  echo $_SESSION['user_name'] ;     ?>
            </div>
            <div class="col">
            <a href="logout.php">Sair</a>
            </div>
      </div>

      <div class="row">
                  <div class="col">
                  <a class="btn btn-primary" href="lista.php">Voltar</a>
                  </div>
            </div>

      <div class="row">
            <div class="col">
                  
                  <?php

// Obtém o ID do produto da query string
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($product_id > 0) {
    // Consulta o banco de dados para obter os detalhes do produto
    $sql = "SELECT * FROM farmacia WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $product_id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Exibe os detalhes do produto
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "<h1>" . htmlspecialchars($row['id']) . "</h1>";
        $descricao = htmlspecialchars($row['descricao']);
        echo "<p>Descrição: " . htmlspecialchars($descricao) . "</p>";
        echo "<p>Grupo: " . htmlspecialchars($row['grupo']) . "</p>";
        echo "<p>Preço: R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";
        echo "<p>Validade: " . htmlspecialchars($row['validade']) . "</p>";
        echo "<p>Quantidade em estoque: " . htmlspecialchars($row['estoque']) . "</p>";

        if (!empty($row['imagem'])) {
        echo "<p><img src='" . htmlspecialchars($row['imagem']) . "' alt='$descricao' style='width: 200px; height: 200px;'></p>";
            // echo "<p><img src='" . htmlspecialchars($row['imagem']) . "' alt='$descricao'></p>";
        } else {
            echo "<p>Imagem não disponível.</p>";
        }


    } else {
        echo "<p>Produto não encontrado.</p>";
        // Redireciona de volta para a lista de produtos após 2 segundos
        header("refresh:2;url=lista.php");
    }
} else {
    echo "<p>ID de produto inválido.</p>";
}

$conn = null;
?>
</div>
</div>