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
        echo "<p>Descrição: " . htmlspecialchars($row['descricao']) . "</p>";
        echo "<p>Grupo: " . htmlspecialchars($row['grupo']) . "</p>";
        echo "<p>Preço: R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";
        echo "<p>Validade: " . htmlspecialchars($row['validade']) . "</p>";
        echo "<p>Quantidade em estoque: " . htmlspecialchars($row['estoque']) . "</p>";

        if (!empty($row['arquivo'])) {
            echo "<p><img src='" . htmlspecialchars($row['arquivo']) . "' alt='Imagem do produto'></p>";
        } else {
            echo "<p>Imagem não disponível.</p>";
        }


    } else {
        echo "<p>Produto não encontrado.</p>";
    }
} else {
    echo "<p>ID de produto inválido.</p>";
}

$conn = null;
?>
</div>
</div>