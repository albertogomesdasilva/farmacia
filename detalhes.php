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
                    <h1 class="text-info">Detalhes</h1>
                    <hr>
                </div>
            </div>

            <div class="row mb-3">
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
                <div class="col-md-6">
                    <h2><?php echo htmlspecialchars($row['id']); ?></h2>
                    <p><strong>Descrição:</strong> <?php echo htmlspecialchars($row['descricao']); ?></p>
                    <p><strong>Grupo:</strong> <?php echo htmlspecialchars($row['grupo']); ?></p>
                    <p><strong>Preço:</strong> R$ <?php echo number_format($row['preco'], 2, ',', '.'); ?></p>
                    <p><strong>Validade:</strong> <?php echo htmlspecialchars(DateTime::createFromFormat('Y-m-d', $row['validade'])->format('d-m-Y')); ?></p>
                    <p><strong>Quantidade em estoque:</strong> <?php echo htmlspecialchars($row['estoque']); ?></p>
                </div>
                <div class="col-md-6">
                    <?php if (!empty($row['imagem'])) { ?>
                        <img src='<?php echo htmlspecialchars($row['imagem']); ?>' alt='<?php echo htmlspecialchars($row['descricao']); ?>' class='img-fluid rounded'>
                    <?php } else { ?>
                        <p>Imagem não disponível.</p>
                    <?php } ?>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "<div class='container mt-5'><p class='alert alert-warning'>Produto não encontrado.</p></div>";
        // Redireciona de volta para a lista de produtos após 2 segundos
        header("refresh:2;url=lista.php");
    }
} else {
    echo "<div class='container mt-5'><p class='alert alert-danger'>ID de produto inválido.</p></div>";
}

$conn = null;
?>
