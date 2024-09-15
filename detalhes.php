<?php
include 'header.php';
session_start();


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

if (!isset($_SESSION['user_id'])) {
      header("Location: ./login.php");
}
include 'logado.php';
?>
           <div class="container">
      <div class="row">
            <div class="col">
            <h1  style="color: #138496">Detalhes </h1>
            </br>
            </br>
            </div>
           
      </div>

      <div class="row">
                  <div class="col">
                <a class="btn btn-primary" href="lista.php">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>
                <a class="btn btn-warning" href='editar.php?id=<?php echo $row['id'] ?>'>
                    <i class="fas fa-edit"></i> Editar
                </a>
                <a class="btn btn-danger" href='excluir.php?id=<?php echo $row['id'] ?>'>
                    <i class="fas fa-trash-alt"></i> Excluir
                </a>
                  </div>
            </div>

      <div class="row">
            <div class="col">
                  
                  <?php


        echo "<h1>" . htmlspecialchars($row['id']) . "</h1>";
        $descricao = htmlspecialchars($row['descricao']);
        echo "<p>Descrição: " . htmlspecialchars($descricao) . "</p>";
        echo "<p>Grupo: " . htmlspecialchars($row['grupo']) . "</p>";
        echo "<p>Preço: R$ " . number_format($row['preco'], 2, ',', '.') . "</p>";

        $validade = DateTime::createFromFormat('Y-m-d', $row['validade']);
        echo "<p>" . htmlspecialchars($validade->format('d-m-Y')) . "</p>";
        // echo "<p>Validade: " . htmlspecialchars($row['validade']) . "</p>";
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